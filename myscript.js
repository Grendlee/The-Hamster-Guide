$(document).ready(function(){

    const savedTheme = localStorage.getItem('theme');

    //uses the saved theme to save theme on page
    //savedTheme is null the first time the page loads on someones browser
    if (savedTheme)
    {
        if (savedTheme == 'dark')
        {
            //adds dark mode class back if savedTheme is dark mode when page is navigated
            $('body').addClass("darkMode");
            $("#theme-toggle").children('.material-symbols-outlined').text("Dark");
        }
        else
        {
            //removes dark mode class back if savedTheme is dark mode when page is navigated
            $('body').removeClass("darkMode");
            $("#theme-toggle").children('.material-symbols-outlined').text("Light");
        }
    }


    //for switching mode when dark or light is clicked
    $("#theme-toggle").on('click', function()
    {
        if ($('body').hasClass("darkMode"))
        {
            $('body').removeClass("darkMode");
            $("#theme-toggle").children('.material-symbols-outlined').text("Light");
            localStorage.setItem('theme', 'light');
        }
        else
        {
            $('body').addClass("darkMode");
            $("#theme-toggle").children('.material-symbols-outlined').text("Dark");
            localStorage.setItem('theme', 'dark');
        }
    });


    //when an image is clicked toggle the highlighted class for that image
    $(".gallery img").click(function()
    {
        $(this).toggleClass("highlighted");
    });

    //downloads the images selected when the button is clicked
    $("#download-btn").click(function()
    {
        //ooks at each highlighted image
        $(".gallery img.highlighted").each(function()
        {
            //get the src attribute, pass the src to the function to download
            downloadImage($(this).attr('src'));
        });
    });

    //sets download option to user
    function downloadImage(url)
    {
        //create empty element
        let element = document.createElement('a');
        //set the elemnts href to the src url
        element.href = url;
        //set the download attribute to empty string
        element.download = "";
        //add element to document
        document.body.appendChild(element);
        //prompt download
        element.click();
    }
});





