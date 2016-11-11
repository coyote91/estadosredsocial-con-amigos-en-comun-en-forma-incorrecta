function mostrar()
{
	document.getElementById("box1").style.display="block";
	
}

window.addEventListener('mouseup', function(event)
{
	
  var box = document.getElementById('box1');
   if(event.target != box && event.target.parentNode != box)
   {
   	  box.style.display = 'none';
   	
   }
	
});



//ESTE ES EL CODIGO QUE OCULTA LA VENTANA DE RESULTADOS DEL BUSCADOR
//DE USUARIOS , LA VENTANA DE RESULTADOS SE LLAMA DISPLAY

window.addEventListener('mouseup', function(event)
{
	
  var box = document.getElementById('display');
   if(event.target != box && event.target.parentNode != box)
   {
   	  box.style.display = 'none';
   	
   }
	
});


