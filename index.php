<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Snacks</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            padding-top: 100px; /* Space for fixed navbar */
        }
        .navbar {
            background-color: #11573e;
        }
        .navbar-brand {
            font-size: 1.5rem;
            color:#f5f5f5!important;
            
        }
        .navbar-log{
            font-size: 1.5rem;
            color:#f5f5f5;
            display: block;
        }
        .navbar-nav {
            flex-direction: row;
        }
        .navbar-nav .nav-item {
            margin-left: 1rem;
        }
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }
        .search-bar {
            width: 50%; /* Adjust width as needed */
            max-width: 500px; /* Maximum width for large screens */
        }
        .search-form {
            display: flex;
            justify-content: center;
            flex: 1;
        }
        .search-input {
            flex: 1;
        }
        .icon-links {
            display: flex;
            align-items: center;
            margin-left: 1rem;
        }
        .icon-links a {
            margin-left: 1rem;
            color: #f5f5f5;
            font-size: 1.2rem;
        }
        .modal-open {
            overflow: hidden;
            position: relative;
        }

        .modal-open::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

 /* Estilos para la ventana registro modal */

    .modal-dialog1 {
    position: relative;
    width: 40%;
    margin: 40px auto;
     }

    .modal-title1 {
      text-align: center;
      display: flex;
      justify-content: center;
    }
 
   .modal-content1 {
   position: relative;
   background-color: #fff;
   border: 1px solid #ddd;
   padding: 20px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   border-radius: 15px;
 }
 
 .modal-body1 {
   padding: 20px;
 }
 
 .form-group {
   margin-bottom: 20px;
 }
 
 label {
   display: block;
   margin-bottom: 10px;
 }
 
 input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
   width: 100%;
   height: 40px;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 5px;
 }
 
 button[type="submit"] {
   width: 100%;
   height: 40px;
   background-color: #337ab7;
   color: #fff;
   border: none;
   border-radius: 5px;
   cursor: pointer;
 }
 
 button[type="submit"]:hover {
   background-color: #23527c;
 }
 
 button[type="button"] {
   width: 10%;
   height: 40px;
   background-color: #ccc;
   color: #333;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   margin-right: 10px;
 }
 
 button[type="button"]:hover {
   background-color: #aaa;
 }

 .BOTONDEMIERDADEREGISTER{
   width: 10%;
   height: 40px;
   background-color: #ccc;
   color: #333;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   margin-right: 10px;
 }
  .BOTONDEMIERDADEVOLVER{
  margin-top: 10px;
   width: 100%;
   height: 40px;
   background-color: #ccc;
   color: #333;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   margin-right: 10px;
  }
 

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#">El Portugués</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          
            
            <div class="search-form mx-auto">
                <input class="form-control search-bar search-input" type="search" id="searchBar" placeholder="Buscar..." aria-label="Buscar">
            </div>
            <div class="icon-links ml-auto">

                <a href="./Ingresar/index.php" style="padding: 0;" type="button" ><i class="fas fa-user" style="display: block; margin-left: 32%; padding: 0;margin-bottom: 0;"></i><span style="font-size: 14px;margin: 0;">Ingresar</span></a>
        
                <a id="cartButton" href="#"><i class="fas fa-shopping-cart" style="display: block; margin-left: 25%; padding: 0;margin-bottom: 0;"></i></i><span style="font-size: 14px;margin: 0;">Carrito</span></a>
            </div>
        </div>
    </nav>

    <div id="filters">
        <label for="priceFilter">Filtrar por precio:</label>
        <select id="priceFilter">
            <option value="all">Todos</option>
            <option value="low">$0 - $10.000</option>
            <option value="medium">$10.000 - $45.000</option>
            <option value="high">+ $45.000 </option>
        </select>

        <label for="qualityFilter">Filtrar por marca:</label>
        <select id="qualityFilter">
            <option value="all">Todos</option>
            <option value="low">Baja</option>
            <option value="medium">Media</option>
            <option value="high">Alta</option>
        </select>
    </div>

    <main id="productList">
        <!-- Productos serán generados aquí por JavaScript -->
        
    </main>

   <!-- <button id="cartButton"><i class="fas fa-shopping-cart"></i>
        <a href="image.png"></a></button>-->

    <div id="cartModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Carrito de Compras</h2>
            <ul id="cartItems">
                <!-- Items del carrito serán generados aquí por JavaScript -->
            </ul>
            <a href="./carrito.php"><button class="carrito">Terminar compra</button></a>
        </div>
    </div>

    <script src="scripts.js"></script>


   


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 </body>

 </html>