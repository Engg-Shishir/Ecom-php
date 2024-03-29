
<?php
session_start();
include_once("../../Connection/connection.php");
$action = $_POST['action'];

if ($action == "load") {
  $page = 1;
  $search = $_POST['query'];
  $limit = $_POST['limit'];
  $page_array = array();
  $output = '';
  $start = '';
  $query = '';
  $filter_query = '';


  if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
  } else {
    $start = 0;
  }


  $query = "SELECT * FROM `product` ";
  if ($search != '') {
    $query .= " WHERE name LIKE '%" . $search . "%' OR  category LIKE '%" . $search . "%' OR  scharge LIKE '%" . $search . "%' OR  discount LIKE '%" . $search . "%' ";
  }

  $query .= 'ORDER BY id DESC ';
  $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';


  $resultset = mysqli_query($conn, $query);
  $total_data = mysqli_num_rows($resultset);

  if ($total_data > 0) {
    $query_run = mysqli_query($conn, $filter_query);
    $result_array = [];
    foreach ($query_run as $row) {
      array_push($result_array, $row);
    }


    $total_links = ceil($total_data / $limit);
    $previous_link = '';
    $next_link = '';
    $page_link = '';

    $output .= '
            <div class="d-flex align-items-center justify-content-center">';

    if ($limit > 5) {
      if ($limit < $total_data) $output = '<p>Shows ' . $limit . ' from ' . $total_data . '</p>';
      else $output = '<p>Shows ' . $total_data . ' from ' . $total_data . '</p>';
    } else {
      if (($page * 5) < $total_data) {
        $output = '<p>Shows ' . ($page * 5) . ' from ' . $total_data . '</p>';
      } else {
        $output = '<p>Shows ' . $total_data . ' from ' . $total_data . '</p>';
      }
    }


    $output .= '<ul class="pagination">';

    for ($count = 1; $count <= $total_links; $count++) {
      $page_array[] = $count;
    }

    for ($count = 0; $count < count($page_array); $count++) {
      if ($page == $page_array[$count]) {
        $previous_id = $page_array[$count] - 1;
        $next_id = $page_array[$count] + 1;

        if ($previous_id > 0) {
          $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
        } else {
          $previous_link = '
                      <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                      </li>
                      ';
        }

        $page_link .= '
                    <li class="page-item active ">
                    <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
                    </li>
                    ';

        if ($next_id > $total_links) {
          $next_link = '
                      <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                      </li>
                        ';
        } else {
          $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
      }
    }


    $output .= $previous_link . $page_link . $next_link;
    $output .= '</ul></div>';


    array_push($result_array, $output);
    echo json_encode($result_array);
  } else {
    $result_array = [];
    echo json_encode($result_array);
  }
}

if ($action == "edit") {
  $sno = $_POST['sno'];
  $query = "SELECT * FROM `product` WHERE id ='" . $sno . "'";
  $query_run = mysqli_query($conn, $query);

  $cust = mysqli_fetch_assoc($query_run);
  if (mysqli_num_rows($query_run) > 0) {
    echo json_encode($cust);
  }
}



if ($action == "delete") {
  $storePath = "../Asset/image/product/" . $_POST['sno'] . "/";
  unlinkImage($storePath);

  $sql = "DELETE FROM product WHERE sno='" . $_POST['sno'] . "'";
  if (mysqli_query($conn, $sql) == TRUE) {
    echo "done";
  }
}


function unlinkImage($storePath)
{
  $files = glob($storePath . "*");
  if ($files) {
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file one by one
      }
    }
    rmdir($storePath); // delete each product folder
  }
}




function sernum()
{
  $template   = 'XX99-XX99-99XX';
  $k = strlen($template);
  $sernum = '';
  for ($i = 0; $i < $k; $i++) {
    switch ($template[$i]) {
      case 'X':
        $sernum .= chr(rand(65, 90));
        break;
      case '9':
        $sernum .= rand(0, 9);
        break;
      case '-':
        $sernum .= '-';
        break;
    }
  }
  return $sernum;
}




 
