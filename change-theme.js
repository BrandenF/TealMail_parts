if(document.readyState === "complete")
{
	loadbuttons();
	
}


function loadbuttons()
{
alert("loadbuttons works");
document.getElementById('change-theme-btn').addEventListener('click', function () 
{
    let darkThemeEnabled = document.body.classList.toggle('dark-theme');
    localStorage.setItem('dark-theme-enabled', darkThemeEnabled);
});

document.getElementById('change-theme-btn2').addEventListener('click', function () 
{	
	let theme2Enabled = document.body.classList.toggle('theme2');
	localStorage.setItem('theme2-enabled', theme2Enabled);
	alert("function ping");
});

document.getElementById('change-theme-btn3').addEventListener('click', function () 
{
	let theme3Enabled = document.body.classList.toggle('theme3');
	localStorage.setItem('theme3-enabled', theme3Enabled);
});
}//closeloadbuttons
if (JSON.parse(localStorage.getItem('dark-theme-enabled'))) 
{
    document.body.classList.add('dark-theme');
}
if (JSON.parse(localStorage.getItem('theme2-enabled'))) 
{
    document.body.classList.add('theme2');
	alert("theme2 ping");
}
if (JSON.parse(localStorage.getItem('theme3-enabled'))) 
{
    document.body.classList.add('theme3');
}