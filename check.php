<?php 
if($_POST['action_code']=='call')
{
 $grid_size=(int) $_POST['grid_size'];
 $total_columns= $grid_size*$grid_size;
$col_size=$grid_size;
 $i=0;
 $arr=array();
 $y_index=0;

$grid=0;
$j=1;
$k=1;

 while($i<$total_columns){
$position=$i+1;
if($i==0)
{
    $arr['1']="0,0";
}
else{
    if($i<$col_size){
        
        if($y_index==0){
            $arr[$i+1]=$i.",".$y_index;
        }
        else if(($y_index%2)!=0){
            
            if($grid>=$j){

                $grid=$grid-$k;
                //echo $grid;exit;
             $arr[$i+1]=$grid.",".$y_index;
                
            }
            
        }
        else if(($y_index%2)==0){
           

            if($grid<=($j)){

                $grid=$grid+$k;
                //echo $grid;exit;
             $arr[$i+1]=$grid.",".$y_index;
                
            }

        }
    }
    else{
        $y_index=$y_index+1;
        $col_size=$col_size+$grid_size;
        if($y_index%2==0){
            $grid=-1;
            $j=$grid_size;
        }
        else{
            $grid=0;
            $grid=$grid+$grid_size;
            $j=1;
        }
        
        
        continue;
    }
}

    $i++;
 }

 $total_players=3;
$turn=1;
 $winner=0;

 $current_position1=0;
 $current_position2=0;
 $current_position3=0;



$result='';
 $movement_arr1=array();
 $movement_arr2=array();
 $movement_arr3=array();
 while($winner<1){

    if($turn==1){

        $dice_roll=rand(1,6);

        if($current_position1+$dice_roll > $total_columns){
            $get_cords=$arr[$current_position1];
            array_push($movement_arr1,"dice invalid :".$dice_roll."!".$current_position1."!".$get_cords);

        }
        else if ($current_position1+$dice_roll == $total_columns){
          
            $current_position1=$current_position1+$dice_roll;

            $get_cords=$arr[$current_position1];

     
            array_push($movement_arr1,$dice_roll."!".$current_position1."!".$get_cords);

            $winner=1;
            $result='1';
            break;
        }
        else{
            $current_position1=$current_position1+$dice_roll;

            $get_cords=$arr[$current_position1];

     
            array_push($movement_arr1,$dice_roll."!".$current_position1."!".$get_cords);
    
        }
        
        $turn=$turn+1;
    }
    if($turn==2){

        $dice_roll=rand(1,6);

        if($current_position2+$dice_roll > $total_columns){
            $get_cords=$arr[$current_position2];
            array_push($movement_arr2,"dice invalid: ".$dice_roll."!".$current_position2."!".$get_cords);
        }
        else if ($current_position2+$dice_roll == $total_columns){

            

            $current_position2=$current_position2+$dice_roll;

            $get_cords=$arr[$current_position2];

     
            array_push($movement_arr2,$dice_roll."!".$current_position2."!".$get_cords);


            $winner=1;
            $result='2';
            break;
        }
        else{
            $current_position2=$current_position2+$dice_roll;

            $get_cords=$arr[$current_position2];

            
            array_push($movement_arr2,$dice_roll."!".$current_position2."!".$get_cords);

    
        }

        $turn=$turn+1;
    }
    if($turn==3){

        $dice_roll=rand(1,6);

        if($current_position3+$dice_roll > $total_columns){
            $get_cords=$arr[$current_position3];
            array_push($movement_arr3,"dice invalid: ".$dice_roll."!".$current_position3."!".$get_cords);
        }
        else if ($current_position3+$dice_roll == $total_columns){
            $current_position3=$current_position3+$dice_roll;

            $get_cords=$arr[$current_position3];

     
            array_push($movement_arr3,$dice_roll."!".$current_position3."!".$get_cords);


            $winner=1;
            $result='3';
            break;
        }
        else{
            $current_position3=$current_position3+$dice_roll;

            $get_cords=$arr[$current_position3];
            
            array_push($movement_arr3,$dice_roll."!".$current_position3."!".$get_cords);


            
    
        }
        $turn=$turn-2;
    }



 }

 $final_array=array();

 $final_array['winner']=$result;
 $final_array['movement_arr1']=$movement_arr1;
 $final_array['movement_arr2']=$movement_arr2;
 $final_array['movement_arr3']=$movement_arr3;

 
 echo json_encode($final_array);


}

/*
{
    "winner": "1",
    "movement_arr1": [
        "3 !3 ! 2,0",
        "3 ! 6!0,1",
        "3 !9 !2,2"
    ],
    "movement_arr2": [
        "3!3!2,0",
        "5!8!1,2"
    ],
    "movement_arr3": [
        "6!6!0,1"
    ]
}


///
{
    "winner": "1",
    "movement_arr1": [
        "6!6!5,0",
        "5!11!1,1",
        "2!13!0,2",
        "2!15!2,2",
        "1!16!3,2",
        "4!20!4,3",
        "4!24!0,3",
        "4!28!3,4",
        "6!34!2,5",
        "dice invalud!3",
        "2!36!0,5"
    ],
    "movement_arr2": [
        "6!6!5,0",
        "1!7!5,1",
        "3!10!2,1",
        "1!11!1,1",
        "1!12!0,1",
        "6!18!5,2",
        "4!22!2,3",
        "2!24!0,3",
        "6!30!5,4",
        "5!35!1,5"
    ],
    "movement_arr3": [
        "2!2!1,0",
        "2!4!3,0",
        "1!5!4,0",
        "4!9!3,1",
        "3!12!0,1",
        "5!17!4,2",
        "1!18!5,2",
        "6!24!0,3",
        "5!29!4,4",
        "5!34!2,5"
    ]
}
*/

?>