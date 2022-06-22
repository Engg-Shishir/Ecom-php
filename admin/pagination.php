
 <?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "coffe");  
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM `product` ORDER BY `id` DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  
      <table class='table table-bordered'>        
      <thead>
      <tr>
        <th style='text-align:center;'>Image</th>
        <th style='text-align:center;'>Name</th>
        <th style='text-align:center;'>Price</th>
        <th style='text-align:center;'>Category</th>
        <th style='text-align:center;'>Quantity</th>
        <th style='text-align:center;'>Discount</th>
        <th style='text-align:center;'>Shiping Charge</th>
        <th style='text-align:center;'>Action</th>
      </tr>
    </thead>
    <tbody>
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
           <tr> 
                <td>  <img src=./image/product/'.$row["image"].' height="50px" width="50px">  </td>  
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
                <td>'.$row["name"].'</td> 
           </tr>  
      ';  
 }  
 $output .= '</tbody></table><br /><div align="center">';  
 $page_query = "SELECT * FROM `product` ORDER BY `id` DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
    for($i=1; $i<=$total_pages; $i++)  
    {  
        $output .= "<span class='pagination_link' style='cursor:pointer; padding:10px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
    }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?> 