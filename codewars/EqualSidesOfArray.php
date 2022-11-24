function find_even_index($arr){
  for ($i = 0; $i < count($arr); $i++)  {
  if ( (array_sum(array_slice($arr, 0, $i))) == (array_sum(array_slice($arr, ($i+1)))) ) {
    return $i;
    }
  }
return -1;
}
