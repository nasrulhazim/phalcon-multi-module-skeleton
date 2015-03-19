<?php

namespace Mod\ModMan\Controllers; 

use Phalcon\Flash\Direct,
    Phalcon\Flash\Session;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->setVar('title','modman[module-manager]');
    	$this->view->setVar('modules', include(CONFIG_DIR . "modules.php"));
    }

    public function addAction()
    {
    	$this->view->setVar('title','modman[module-manager]');
        $module_name = null;
        $module_namespace = null;
        
        if($this->request->isPost()) {
            $module_name = trim($this->request->getPost('module_name'));
            $module_description = trim($this->request->getPost('module_description'));
            $module_namespace = trim($this->request->getPost('module_namespace'));
            
            if($this->init_module($module_name)) {
                $this->configure_module($module_name, 'Mod\\'.$module_namespace, $module_description);
            }
        }
    }

    public function deleteAction()
    {
    	$this->view->setVar('title','phalcon_multi_module: Module Controller');
    	$this->view->setVar('param','phalcon_multi_module: Module Controller');
    }

    public function updateAction()
    {
    	$this->view->setVar('title','phalcon_multi_module: Module Controller');
    	$this->view->setVar('param','phalcon_multi_module: Module Controller');
    }

    public function viewAction()
    {
    	$this->view->setVar('title','phalcon_multi_module: Module Controller');
    	$this->view->setVar('param','phalcon_multi_module: Module Controller');
    }

    public function editAction()
    {
    	$this->view->setVar('title','phalcon_multi_module: Module Controller');
    	$this->view->setVar('param','phalcon_multi_module: Module Controller');
    }

    private function init_module($module_name, $mo) {
         if(!file_exists(MODULES_DIR . $module_name)) {
            if(mkdir(MODULES_DIR . $module_name, 0775)) {
                // success
                $this->recurse_copy(APP_DIR . 'skel' . DS . 'mod' . DS, MODULES_DIR . $module_name);

                if(is_dir(MODULES_DIR . $module_name)) {
                    return true;
                } else {
                    $this->flash->warning("Failed to initialize module.");
                }
            } else {
                // failed to create directory
                $this->flash->error("Failed to create module.");
            }
        } else {
            // directory already exist
            $this->flash->warning("Module already exist");
        }
    }

    private function configure_module($module_name, $module_namespace, $module_description) {
        
        $path = MODULES_DIR . $module_name . DS;

        // update module name: skel/mod/config
        $config_path = $path . 'config' . DS . 'config.php';
        $this->configure_module_update($config_path, $module_name, '[module_name]');
        
        // update module namespace: skel/mod/controllers/ControllerBase.php
        $basecontroller_path = $path . 'controllers' . DS . 'ControllerBase.php';
        $this->configure_module_update($basecontroller_path, $module_namespace, '[module_namespace]');

        // update module namespace: skel/mod/controllers/IndexController.php
        $indexcontroller_path = $path . 'controllers' . DS . 'IndexController.php';
        $this->configure_module_update($indexcontroller_path, $module_namespace, '[module_namespace]');

        // update module namespace: skel/mod/Module.php
        $module_path = $path . 'Module.php';
        $this->configure_module_update($module_path, $module_namespace, '[module_namespace]');
        $this->configure_module_update($module_path, $module_name, '[module_name]');

        // update module configurations: app/config/modules.php
        $_modules = include(CONFIG_DIR . "modules.php");
        
        if(!isset($_modules[$module_name])) {
           try {
                $config_contents = array();
                foreach ($_modules as $key => $value) {
                    $config_contents[] = "'{$key}' => array(
                    'className' => '{$value['className']}',
                    'path' => MODULES_DIR . '{$key}' . DS . 'Module.php',
                    'description' => '{$value['description']}'
                ),";
                }

                $config_contents[] = "'{$module_name}' => array(
                    'className' => '$module_namespace\Module',
                    'path' => MODULES_DIR . '{$module_name}' . DS . 'Module.php',
                    'description' => '{$module_description}'
                ),";
                
                file_put_contents(CONFIG_DIR . "modules.php", '<?php return array('.join('',$config_contents).');');

                $this->flash->success('Module generated and enabled.');
           } catch (Exception $e) {
               $this->flash->warning('Module generated but unable to enable it. Please see app.config.modules.php');
           }
        } else {
            $this->flash->warning('Module configuration already set.');
        }
    }

    private function configure_module_update($path, $value, $type) {
        try {
            $content = file_get_contents($path);

            $content = str_replace($type, $value, $content);

            file_put_contents($path, $content);
        } catch (Exception $e) {
            $this->flash->error('Unable to update ' . $type . ' for ' . $path);
        }
    }

    private function recurse_copy($source, $destination) { 
        $dir = opendir($source); 
        @mkdir($destination); 
        // need to exclude those in _compiled
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($source . '/' . $file) ) { 
                    $this->recurse_copy($source . '/' . $file, $destination . '/' . $file); 
                } 
                else { 
                    copy($source . '/' . $file, $destination . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    }

}

