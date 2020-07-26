
@php
  // Pagination Serial
  if (request()->filled('page')){
    $PreviousPageLastSN = $items*(request()->page-1); //PreviousPageLastSerialNumber
    $PageNumber = request()->page;
  }
  else{
    $PreviousPageLastSN = 0; //PreviousPageLastSerialNumber
    $PageNumber = 1;
  }

  //Last Page Items Change Restriction
  if ($PageNumber*$items > $total + $items){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }

@endphp
