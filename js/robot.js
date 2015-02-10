/**
 * Created by Bjorn on 2015-01-14.
 */
$(document).ready(function() {

    $(".bag-image").droppable({
        drop: handleDropEvent
    });

    var numberOfPackages = 0;

    //This runs on every drop in the bag
    function handleDropEvent(event, ui) {
        var draggable = ui.draggable;

        //Could use remove() but since float on products they get moved
        draggable.css('visibility', 'hidden');

        if (countSeconds > 0) {
            numberOfPackages++;
            $("#packagecounter").html("Antal Paket: " + numberOfPackages);
        }

        if (numberOfPackages > 2 && numberOfPackages < 5) {
            $(".bag-image").attr("src", "img/bag-half.png");
            $(".imgrobot").attr("src", "img/robot-happy-smaller.png");
        }

        if (numberOfPackages > 5) {
            $(".bag-image").attr("src", "img/bag-full.png");
            $(".imgrobot").attr("src", "img/robot-superhappy-smaller.png");
        }
    }

    var countSeconds = 10;

    $(document).on('click', '#start-game', function(event) {
        $(".popup-window-basic").remove();
        $(".header-plate").css('display', 'block');

        //Make draggable after start is clicked
        $(".products-first-rack img, .products-second-rack img").draggable();

        //start to move bag
        animatethis($('.bag'), 2000);

        //start to move robot
        animateElement();

        //Timer counting down from ten to zero
        var counter = setInterval(function() {
            countSeconds--;
            if (countSeconds <= 0) {
                clearInterval(counter);
                timeIsUp();
                return;
            }
            $("#seconds").html("Tid kvar " + countSeconds);
        }, 1000);
    });

    function timeIsUp() {
        $('.bag').stop();
        $('.robot').remove();
        $('.header-plate').remove();

        $(".timeup-window-basic").css('display', 'block');
        $(".timeup-window-basic h3").html("Du klarade " + numberOfPackages + " produkter");

    }

    //Moves bag on screen
    function animatethis(targetElement, speed) {
        $(targetElement).animate({
            marginLeft: "+=350px"
        }, {
            duration: speed,
            complete: function() {
                targetElement.animate({
                    marginLeft: "-=350px"
                }, {
                    duration: speed,
                    complete: function() {
                        animatethis(targetElement, speed);
                    }
                });
            }
        });
    };

    function makeNewPosition() {

        // remove the dimension of the element
        var h = $(".container").height() - 280;
        var w = $(".container").width() - 180;

        var nh = Math.floor(Math.random() * h);
        var nw = Math.floor(Math.random() * w);

        console.log("h", h);
        console.log("w", w);

        return [nh, nw];

    }

    //Moves robots randomly on screen
    function animateElement() {
        if (countSeconds > 0) {
            var newq = makeNewPosition();
            console.log("newq ", newq);
            //Add 500ms for every package picked
            var speed = 1000 + 500 * numberOfPackages
            $('.robot').animate({
                top: newq[0],
                left: newq[1]
            }, speed, function() {
                animateElement();
            });
        }
    };

    //Ajax with the forms
    $(document).on('submit', 'form', function(event) {

        console.log("Submitting");

        event.preventDefault();

        var formData = {
            'name': $('input[id=name]').val(),
            'points': numberOfPackages,
            'email': $('input[id=email]').val()
        };

        $(".timeup-window-basic").remove();

        console.log("formData", formData);

        // process the form
        var submitAjax = $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            dataType: 'json'
        });

        submitAjax.done(function(data) {

            //The response from the php file didnt format to correct json when running $data=json_encode($results)
            //so need to do it here

            responseParsed = $.parseJSON(data);
            console.log("responseParsed", responseParsed);

            //Build out html table with the response
            var trHTML = '';
            $.each(responseParsed, function(i, item) {
                trHTML += '<tr><td>' + '<span>' + (i + 1) + '</span>' + " " + item.playername + '</td><td>' + item.points + '</td></tr>';
            });
            $('table.results').append(trHTML);

            $(".timeup-window-basic").css('visibility', 'hidden');
            $(".popup-window-toplist").css('display', 'block');
            $(".restart-and-invite").css('visibility', 'visible');
            $("#fb-root").css('display', 'block');

            $("#results").html(data);

        });

        submitAjax.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

    });

    //Share on FB button
    $(document).on('click', 'button#share', function(event) {

        FB.init({
            appId: '328949933978014',
            xfbml: true,
            cookie: true
        });

        FB.ui({
            method: 'share',
            title: 'Play Robot game',
            name: 'Play Robot game',
            href: 'http://www.bjorngustafsson.net/robot/' //change this to actual online page, since working locally now
        });
    });

});