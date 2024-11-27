<!DOCTYPE html>
<html>
<head>
	<title>My Web Page</title>
	<style>
		/* Global Styles */
		
		* {
		  box-sizing: border-box;
		  margin: 0;
		  padding: 0;
		}
		
		body {
		  font-family: Arial, sans-serif;
		  line-height: 1.6;
		  color: #333;
		  background-color: #f5f5f5;
		}
		
		/* Header Styles */
		
		header {
		  background-color: #333;
		  color: #fff;
		  padding: 20px;
		  text-align: center;
		}
		
		header h1 {
		  margin-bottom: 10px;
		}
		
		/* Navigation Styles */
		
		nav ul {
		  list-style: none;
		  margin: 0;
		  padding: 0;
		  display: flex;
		  justify-content: space-between;
		}
		
		nav li {
		  margin-right: 20px;
		}
		
		nav a {
		  color: #fff;
		  text-decoration: none;
		}
		
		nav a:hover {
		  color: #ccc;
		}
		
		/* Main Styles */
		
		main {
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		  padding: 20px;
		}
		
		section {
		  background-color: #fff;
		  padding: 20px;
		  margin-bottom: 20px;
		  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		section h2 {
		  margin-top: 0;
		}
		
		section p {
		  font-size: 18px;
		  margin-bottom: 20px;
		}
		
		section img {
		  width: 60%;
		  height: 200px;
		  object-fit: cover;
		  margin-bottom: 20px;
		}
		
		/* Footer Styles */
		
		footer {
		  background-color: #333;
		  color: #fff;
		  padding: 10px;
		  text-align: center;
		  clear: both;
		}
		
		footer p {
		  margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
		<h1>Welcome to My Web Page</h1>
	</header>
	<main>
		<section>
			<marquee><h2>G.B.N Govt. Polytechnic Nilokheri, Karnal</h2></marquee>
						<img src="images.jpeg" alt="An image on the page"	>
		</section>
		<section>
			<marquee><h1>  Registration link</h1></marquee>
			<a href="form.php" alt="Link not found" target="_blank"><H1>REGISTRATIOIN LINK</H1> 
				</a>
		</section>
	</main>
	<footer>
		<p>&copy; 2024 My Web Page</p>
	</footer>
</body>
</html>