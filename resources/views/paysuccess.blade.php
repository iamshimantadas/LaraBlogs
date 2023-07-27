
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Thanks for Donation</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="thanks for donation ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

   <x-users.cssfiles />
   
 
  
</head>

<body>
   

<x-users.header />

<div class="row">
  <div class="col-3"></div>
  <div class="col-6">

  <br>
  <br>
  <br>
  <br>

  <h1 contenteditable spellcheck="false">Thanks for Donation!!</h1>

  <br>
  <br>
  <br>
  <br>

  </div>
  <div class="col-3"></div>
</div>
 


<style>
  @import url(https://fonts.googleapis.com/css?family=Exo+2:200i);

:root {
  /* Base font size */
  font-size: 10px;   
  
  /* Set neon color */
  --neon-text-color: #f40;
  --neon-border-color: #08f;
}

/* body {
  font-family: 'Exo 2', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;  
  background: #000;
  min-height: 100vh;
} */

h1 {
  font-size: 9rem;
  font-weight: 100;
  font-style: italic;
  color: #fff;
  padding: 4rem 6rem 5.5rem;
  border: 0.4rem solid #fff;
  border-radius: 2rem;
  text-transform: uppercase;
  animation: flicker 1.5s infinite alternate;     
}

h1::-moz-selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1::selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1:focus {
  outline: none;
}

/* Animate neon flicker */
@keyframes flicker {
    
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
      
        text-shadow:
            -0.2rem -0.2rem 1rem #fff,
            0.2rem 0.2rem 1rem #fff,
            0 0 2rem var(--neon-text-color),
            0 0 4rem var(--neon-text-color),
            0 0 6rem var(--neon-text-color),
            0 0 8rem var(--neon-text-color),
            0 0 10rem var(--neon-text-color);
        
        box-shadow:
            0 0 .5rem #fff,
            inset 0 0 .5rem #fff,
            0 0 2rem var(--neon-border-color),
            inset 0 0 2rem var(--neon-border-color),
            0 0 4rem var(--neon-border-color),
            inset 0 0 4rem var(--neon-border-color);        
    }
    
    20%, 24%, 55% {        
        text-shadow: none;
        box-shadow: none;
    }    
}
</style>

   <x-users.footer />

  <x-users.jsfiles />

</body>

</html>

