<?php  
class CommonAction extends Action  
{  
    public function _initialize()  
    {  
  	
        if (!isset($_SESSION['uid'])) {  
            $this->redirect(Admin."/admin/login");            
        }  
    }  
}  
?> 