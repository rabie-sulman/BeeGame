 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
 <html>  
 <head>  
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
 <title>GameBee</title>  
 </head>  
 <body> 

 <form action="./hit">
    <input type="submit" value="hit">
    <label><?php echo $this->data['status']."<br>";?></label>
 </form>
     <p>
   <?php 
    echo $this->data['hiveStatus']." <br>";?>
    </p>
  
 </body>  
 </html> 
