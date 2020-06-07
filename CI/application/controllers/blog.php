<?php if ( ! defined('BASEPATH'))  
         exit('No direct script access allowed'); 
class Blog extends CI_Controller { 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    function index() 
    { 
      echo "Haloo.. saya adalah contoh codeigniter 
pertama"; 
    } 
} 
/* End of file Blog.php */ 
/* Location: ./application/controllers/blog.php */ 