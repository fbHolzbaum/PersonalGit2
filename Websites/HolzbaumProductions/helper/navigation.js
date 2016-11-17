	//<!--		
	
	var menuOpen = false;
	function CallNavigation(){
		//Change navigationbutton background
		if(!menuOpen)
		{
			//Open Menu
			document.getElementById("mobilenavigationOff").id = 'mobilenavigation';
			document.getElementById("mobilenavigationbutton").style.background = "rgb(30, 96, 97)";
			document.getElementById("body").className = "stop-scrolling";
			document.getElementById("navigationbuttonimage").src="images/main/x.jpg";
			menuOpen = true;
		}else
		{
			//Close Menu
			document.getElementById("mobilenavigation").id = 'mobilenavigationOff';
			document.getElementById("mobilenavigationbutton").style.background = "white";
			document.getElementById("body").className = "";
			document.getElementById("navigationbuttonimage").src="images/main/menubutton.png";
			menuOpen = false;
		}
	}
	
	
	var openSubCategory = 0;
	function CallSubNavigation(idNumber)
	{
		DisableAllNavigation(); //Set every open subcategory back
		if(idNumber != openSubCategory)
		{
			//idnumbers: 1 -> news, 2 -> games, 3 -> about				
			var navigationString = "navigation" + idNumber;
			var subNavigationString = "lower" + navigationString;
			var arrowString = "arrow" + idNumber;
			document.getElementById(navigationString).style.background = "rgba(28, 88, 89, 0.98)";
			document.getElementById(subNavigationString).className = "lowernavigation";
			document.getElementById(arrowString).innerHTML = "&#x25B2";
			
			openSubCategory = idNumber;
		}else{
			openSubCategory = 0;
		}
	}
	
	function DisableAllNavigation()
	{
		document.getElementById("navigation1").style.background = "";
		document.getElementById("lowernavigation1").className = "hidden";
		document.getElementById("arrow1").innerHTML = "&#x25BC";
		
		document.getElementById("navigation2").style.background = "";
		document.getElementById("lowernavigation2").className = "hidden";
		document.getElementById("arrow2").innerHTML = "&#x25BC";
		
		document.getElementById("navigation3").style.background = "";
		document.getElementById("lowernavigation3").className = "hidden";
		document.getElementById("arrow3").innerHTML = "&#x25BC";
		
		document.getElementById("body").className = "";
	}
	
//-->