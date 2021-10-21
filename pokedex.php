<?php
if(!isset($_GET['pokemon'])){
  $pokemon = 1;
}
else{
  $pokemon = $_GET['pokemon'];
}

$url = 'https://pokeapi.co/api/v2/pokemon/'. $pokemon;
// for name, id, images and moves
$PokemonData = file_get_contents($url);

$pokemo = json_decode($PokemonData, true);
$datamoves = $pokemo['moves'];
$typePokemon = $pokemo['types'];
//for previous evolution
$previousEv = $pokemo['species']['url'];
$species = file_get_contents($previousEv);
$preSpecies = json_decode($species , true);

$getValue = $preSpecies ['evolves_from_species']['name'];

$link = 'https://pokeapi.co/api/v2/pokemon/';

$image = $link . $getValue;
$PokemonPredata = file_get_contents($image);

$pokem = json_decode($PokemonPredata, true);

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2288eaea4.js" crossorigin="anonymous"></script>
    
    <title>pokemon DEX</title>
    
</head>
<body> 
    <div class ="container">
       <div class="search-form">
        <div class="title">
			<br>
			
		
        <h1><strong>POKEDEX</strong></h1>
        <br>
        <form method="get" action="pokedex.php">
        <input type="text" class="search-input" name="pokemon" placeholder="Search your favourite pokemon" required style="box-shadow: none">
     
        <button type="submit" class= "search-btn">Search</button>
		<br>
</form>
       </div>
	   
       </div>
	   
    <div class="card-header">
		
      <h1 class="name "><?php echo $pokemo['name'];  ?></h1>
	   
    </div>
    <div class="card-header">
        <h3 class="name-id"><?php echo $pokemo['id']; ?></h3>
      
      </div>
    
        <img src="<?php echo $pokemo['sprites']['front_default'];  ?>" alt="" >

    
     
    <h2> <center>Types</center></h2>
<?php foreach($pokemo ['types']as $key => $typePoke){
  if($key<4){
    echo  $typePoke ['type']['name'] . '...' ;
  }}?>
<br>
    
        
        <br>
        <div>
          <h2> <center>Moves </center></h2>
         
        <?php foreach($pokemo['moves'] as $key=>$moves){
 if($key<4){ 


   echo $moves['move']['name'] . "..."; 
  

 }}?>

 </div>    
     <img src="<?php echo $pokem['sprites']['front_default'];?>" alt="" >
      
</div>


   
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color : rgb(255, 255, 255);
  
}

.title{
  text-align: center;
}
body{
  overflow: hidden;
  background: url("/Images/pokemo.jpg") no-repeat;
  
  font-family: "lato",sans-serif;
  background: rgb(173, 35, 37);
}
.container{
  width:100%;
  height:100vh;
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.search-form{
  margin-bottom: 2rem;
  display:flex;
}
.search-input{
  border-radius: 5px;
  font-size: 16px;
  width: 250px;
  height: 40px;
  margin-top: 30px;
  color: crimson;

}
.search-btn{
  border-radius: 5px;
  font-size: 25px;
  width: 200px;
  height: 50px;
  margin-top: 25px;
  color: crimson;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

.search-btn:hover{
  color: aliceblue;
  background-color: crimson;
  
}
.card{
  background : linear-gradient(to bottom, rgb(245,163,41),rgb(233,205,45));
  padding: 1rem;
  width:200px;
  height:500px;
  box-shadow: 5px 10px 20px rgba(182, 175, 175, 0.5);
  border-radius: 5px;
}
.card-header{
  display:flex;
  height:60px;
  align-items: top;
  justify-content: space-between;
}
.name{
  font-size: 1.5rem;
  margin-left: 2rem;
}
.hp{
  margin:0.2rem;

}
.hp-span{
  font-size: 0.7rem;
}
.card-img{
  background:url('');
  background-size: cover;
  width:250px;
  height:175px;
  margin :0 auto;
}
.card-img img{
  width: 200px;

}
.card-body{
  margin-top: 3rem;
}
.card-body-header{
  display:flex;
  justify-content: space-around;
}
.card-body-header-h1{
  display: inline-block;
  padding: 0.5rem;
  background-color:   rgb(228,43,42);
  border: 2px solid rgb(233,231,43);
  border-radius: 5px;
  color: white;
  font-weight:400;
}
.card-body-header-h2{
  color:rgb(228,41,43);
  font-size: 1.5rem;
  margin-top: 0.3rem;
}
.paragraph{
  margin:1rem;
  font-size:0.9rem;
}
.card-footer{
  display:flex;
  justify-content: space-between;
  margin-top : 2.5rem;
}

 </body> 
  
  </style>
</html>