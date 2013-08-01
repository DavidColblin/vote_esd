<style>
/* ---- table (general)---- */
div.row { clear: both; padding-top: 6px; }
div.row span.label  { float: left; width: 100px; text-align: right; }
div.row .col  { float: right; width: 280px; text-align: left; }
form  { width:400px; }
</style>
<?php
function searchDB($id)
{
    require('../dbconn.php');
    
    $sql="SELECT P.p_id, P.p_name, EP.e_id
    FROM  participants AS P
    INNER JOIN event_participants AS EP
    ON  P.p_id = EP.p_id
    WHERE EP.e_id='$id'";
    $result =  mysql_query($sql);
    mysql_close($conn);
    
    return $result;
}

function display($result)
{
    while ($row =  mysql_fetch_assoc($result))
    {
        $array[] =  $row;
    }
    
    /* Paticipants for Event No. x:
    No 1 : Fifi () - radio btn */
    
    $e_id = $array[0]['e_id'];
    $output = '<p>Paticipants for Event No. ' . $e_id . ' : </p>';
    $output .= '<form method="get" action="receipt.php">';
    $x = 1;
    foreach ($array as $arrays)
    {
        $output .= '<div class="row">';
        $output .= '<span class="label">No. ' . $x . ' : </span>';
        $output .= '<div class="col">';
        $output .= '<input type="radio" name="p_id" value="' . $arrays['p_id'] . '" id="op' . $x . '" />';
        $output .= '<label for="op' . $x . '"> ' . $arrays['p_name'] . '</label><br>';
        $output .= '</div></div>';
        $x++;
    }
    $output .= '<input type="hidden" name="e_id" value="' . $e_id . '" />';
    //add hidden input for key here
    $output .= '<div class="row"><div class="col"><p><input type="submit" value="Vote" /></p></div></div></form>';
    
    return $output;
}

$result = searchDB("1");
echo display($result);
?>
