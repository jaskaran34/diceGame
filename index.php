<html>
    <head>
    <script src="xmlHttpClient.js"></script>
    <script src="xmlHttpClientARTH.js"></script>
    </head>
    <body>
    <div style="margin-top: 5%;margin-left:10%;">
<form>
<table>
    <tr>
        <td><label>Grid</td>
        <td><input type="text" id="grid_size" readonly></td>
        <td><label>Players</td>
        <td><input type="text" id="players" value="3" readonly></td>
    </tr>
</table>
</form>
<div>
    <table id="mytable">
        
            <tr>
             <td>   Player No <td>
             <td>   Dice roll history <td>
             <td>   Position history <td>
             <td>   Co-ordinate history <td>
             <td>   Winner status<td>
            </tr>
            <tr>
                <td><input type="text" value="1"><td>
                <td><input type="text" value="" id="dice1" class="wide"> <td>
                <td><input type="text" value="" id="pos1" class="wide"><td>
                <td><input type="text" value="" id="cord1" class="wide"><td>
                <td><input type="text" value="" id="win1" ><td>
            </tr>
            <tr>
            <td><input type="text" value="2"><td>
            <td><input type="text" value="" id="dice2" class="wide"> <td>
                <td><input type="text" value="" id="pos2" class="wide"><td>
                <td><input type="text" value="" id="cord2" class="wide"><td>
                <td><input type="text" value="" id="win2" ><td>
            </tr>
            <tr>
            <td><input type="text" value="3"><td>
            <td><input type="text" value="" id="dice3" class="wide"> <td>
                <td><input type="text" value="" id="pos3" class="wide"><td>
                <td><input type="text" value="" id="cord3" class="wide"><td>
                <td><input type="text" value="" id="win3" ><td>
            </tr>
        
    </table>
</div>
</div>

<style>
    .wide{
        width: 300px;
    }
</style>

<script type="text/javascript">
    let grid_size=prompt('Enter Grid Size');
    //let grid_size=3;
    document.getElementById('grid_size').value=grid_size;
    let str=xmlHTTP_send_post('check.php','action_code=call&grid_size='+grid_size);
    str=JSON.parse(str);
    if(str['winner']=='1'){

document.getElementById('win1').value='Winner';
document.getElementById('win1').style.backgroundColor='green';
document.getElementById('win2').style.textDecoration='Bold';
}
if(str['winner']=='2'){

document.getElementById('win2').value='Winner';
document.getElementById('win2').style.backgroundColor='green';
document.getElementById('win2').style.textDecoration='Bold';
}
if(str['winner']=='3'){

document.getElementById('win3').value='Winner';
document.getElementById('win3').style.backgroundColor='green';
document.getElementById('win2').style.textDecoration='Bold';
}
    const movement_arr1=str['movement_arr1'];

    const movement_arr2=str['movement_arr2'];
    const movement_arr3=str['movement_arr3'];
    
  
     dice1="";
     cord1="";
     pos1="";

     dice2="";
     cord2="";
     pos2="";

     dice3="";
     cord3="";
     pos3="";

  

let count=0;
     while(count<movement_arr1.length){
        res=movement_arr1[count].split('!');
       
        if(count==0){
            dice1=res[0];
            pos1=res[1];
            cord1='('+res[2]+')';
        }
        else{
            dice1=dice1+','+ res[0];
            pos1=pos1+','+ res[1];
            cord1=cord1+ ',('+  res[2]+ ')';
        }
   
    count++;
    }
    document.getElementById('dice1').value=dice1;
    document.getElementById('pos1').value=pos1;
    document.getElementById('cord1').value=cord1;
    


    
let counter=0;
     while(counter<movement_arr2.length){
        ress=movement_arr2[counter].split('!');
       
        if(counter==0){
            dice2=ress[0];
            pos2=ress[1];
            cord2='('+ress[2]+')';
        }
        else{
            dice2=dice2+','+ ress[0];
            pos2=pos2+','+ ress[1];
            cord2=cord2+ ',('+  ress[2]+ ')';
        }
   
    counter++;
    }
    document.getElementById('dice2').value=dice2;
    document.getElementById('pos2').value=pos2;
    document.getElementById('cord2').value=cord2;


    let counter3=0;
     while(counter3<movement_arr3.length){
        ressu=movement_arr3[counter3].split('!');
       
        if(counter3==0){
            dice3=ressu[0];
            pos3=ressu[1];
            cord3='('+ressu[2]+')';
        }
        else{
            dice3=dice3+','+ ressu[0];
            pos3=pos3+','+ ressu[1];
            cord3=cord3+ ',('+  ressu[2]+ ')';
        }
   
        counter3++;
    }
    document.getElementById('dice3').value=dice3;
    document.getElementById('pos3').value=pos3;
    document.getElementById('cord3').value=cord3;
    


</script>
    </body>
</html>
