
<?php
class layout {
   public static function pageHeader($pageTitle)
    {
        require(__DIR__."/header.php");
    }
    
   public static function pageFooter()
    {
        require(__DIR__."/footer.php");
    }
}
