<?php

namespace App\Library\FileFolder;

class FileFolder {
	const CREATE_FOLDER_SUCCESS = 1;
	const CREATE_FOLDER_FAILED = 2;
	const FOLDER_ALREADY_EXIST = 3;
	const COPY_RECURSE_SUCCESS = 4;
	const COPY_RECURSE_FAILED = 5;

	public static function create_folder($path) {
		// check if directory exist, exit
        if(!file_exists(MODULES_DIR . $module_name)) {
            if(mkdir(MODULES_DIR . $module_name, 0775)) {
            	// return success
                return self::CREATE_FOLDER_SUCCESS;
            } else {
                // failed to create directory
                return self::CREATE_FAILED;
            }
        } else {
            // directory already exist
            return self::FOLDER_ALREADY_EXIST;
        }
	}

	/**
	 * http://stackoverflow.com/questions/2050859/copy-entire-contents-of-a-directory-to-another-using-php
	 */
	public static function recurse_copy($source, $destination) { 
	    $dir = opendir($source); 
	    @mkdir($destination); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($source . '/' . $file) ) { 
	                self::recurse_copy($source . '/' . $file, $destination . '/' . $file); 
	            } 
	            else { 
	                copy($source . '/' . $file, $destination . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	}
}