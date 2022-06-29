
<?php


// ###############################################################
// ###############################################################
// Create Connection
$connect = new PDO("mysql:host=localhost; dbname=coffe", "root", "");
// include_once("../../connection.php");
// ###############################################################
// ###############################################################
// Get Total Row function

function get_total_row($connect)
{
  $query = "SELECT * FROM `product` ";
  $statement = $connect->prepare($query);
  $statement->execute();
  // Return total row
  return $statement->rowCount();
}

function load(){
 
}




// ###############################################################
// ###############################################################
// Call get total row count function
$total_record = get_total_row($connect);
// page array
$page_array = array();
// Product show limit per page
$limit = $_POST['limit'];
// Page variable, by default 1
$page = 1;
// Thia is a output variable
$output = ''; 


// ###############################################################
// ###############################################################
// $_POST['page'] comes from ajax request 
if($_POST['page'] > 1)
{
  // Product show from 0 by default. If page number is 2, then get data from 5
  $start = (($_POST['page'] - 1) * $limit);
  // Store incomoing page number
  $page = $_POST['page'];
}
else
{
  // If page number is 1
  $start = 0;
}


// ###############################################################
// ###############################################################
$query = "SELECT * FROM `product` ";
// $_POST['query'] comes from ajax request, and this data is search box data
if($_POST['query'] != '')
{
  $query .= 'WHERE name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}
$query .= 'ORDER BY id DESC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';


// ###############################################################
// ###############################################################
// count total data
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();


// ###############################################################
// ###############################################################
$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll(); // Feth all data




// ###############################################################
// ###############################################################
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
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '  
    <tr> 
         <td>  <img src="image/product/'.$row["image"].'"  height="50px" width="50px">  </td>  
         <td>'.$row["name"].'</td> 
         <td>'.$row["price"].'</td> 
         <td>'.$row["category"].'</td> 
         <td>'.$row["quantity"].'</td> 
         <td>'.$row["discount"].'</td> 
         <td>'.$row["scharge"].'</td> 
         <td class="d-flex align-items-center justify-content-around">
           <a onclick="showDeleteAlert('.$row["id"].')" class="btn btn-sm"id="'.$row["id"].'"><i class="fas fa-trash"></i></a>
           <i class="fas fa-pen edit" id="'.$row["id"].'"></i>
           <i class="fas fa-eye details" id="'.$row["id"].'"></i>
         </td> 
    </tr>
'; 
?>

                  
    <script>
    
    function showDeleteAlert(id){

      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "./action/product_delete.php",
            type: "POST",
            cache: false,
            data:{
              id: id
            },
            success: function(response){
              if(response=="done"){
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
              }
            }
          });
        }
      });


    }
    
</script>
<?php
  }
}
else 
{
  $output .= '
  <tr>
    <td colspan="8"><img src="./image/Fixed/noRecordFound.svg"></td>
  </tr>
  ';
}

$output .= '
</tbody></table>
<br />
<div class="d-flex align-items-center justify-content-center">
  <ul class="pagination">
';



// ###############################################################
// ###############################################################
$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';



if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else{
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
  }
}else{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}


// ###############################################################
// ###############################################################
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active ">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';


    // ###############################################################
    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }

    // ###############################################################
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }

  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

// 
$output .= $previous_link . $page_link . $next_link;
$output .= '</ul></div>';

echo $output;

?>
