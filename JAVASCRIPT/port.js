$(document).ready(function() {
    var res = document.getElementById("res");
    var arr = ["front-end Developer", "B.E Graduate", "UI-UX Designer","Backend Developer"];
    var lastValue = "";

    function change() {
        var ran;
        do {
            ran = Math.floor(Math.random() * arr.length);
        } while (arr[ran] === lastValue);
        lastValue = arr[ran];
        return arr[ran];
    }

    function update() {
        var s = change();
        $(res).fadeOut(800, function() {
            res.textContent = s;
            $(res).fadeIn(800);
        });
    }
   

        update();
        setInterval(update, 4000);

       $(".nav-link").hover(
                function() {
                    $(this).css("color", "black");
                },
                function() {
                    $(this).css("color", "rgb(64, 246, 246)");
                }
            );
            
            $(window).scroll(function() {
                var scrollPos = $(this).scrollTop();
                var aboutMePos = $('.about-me').offset().top;
                var skillspos=$(".pp").offset().top;
                var myskill=$(".myskill").offset().top;
                var windowHeight = $(this).height();
                var pskill=$(".pskill").offset().top;
    
                if (scrollPos + windowHeight > aboutMePos) {
                    $('.about-me').addClass('visible');
                }
                if(scrollPos + windowHeight > skillspos){
                    $(".pp").addClass('visible');
                }
                if(scrollPos + windowHeight > myskill){
                   $(".myskill").addClass('visible');
                }
                if(scrollPos + windowHeight > pskill){
                    $(".pskill").addClass('visible');
                 }

            });
        
            
            $(window).scroll(function() {
                const scrollTop = $(this).scrollTop();
                const navbar = $(".navbar");
                const navLinks = $(".nav-link");
        
                if (scrollTop > 50) {
                    navbar.css("background-color", "rgba(168, 185, 179, 0.797)");
                    $(".to").css("color","black");
                    navLinks.each(function() {
                        $(this).css("color", "aqua"); 
                    });
                } else {
                    navbar.css("background-color", "transparent");
                    $(".to").css("color","aqua");
                    navLinks.each(function() {
                        $(this).css("color", "rgb(64, 246, 246)"); 
                    });
                }
            });
            let animationExecuted = false; 

            $(window).on('scroll', function() {
                if (!animationExecuted) {
                    const skillsSection = $('.myskill'); 
                    const windowBottom = $(window).scrollTop() + $(window).height();
                    const sectionTop = skillsSection.offset().top;
                    const sectionHeight = skillsSection.outerHeight();
                    if (windowBottom >= sectionTop && windowBottom <= (sectionTop + sectionHeight)) {
                        animationExecuted = true;
            
                        $('.progress-percent').each(function() {
                            var $this = $(this);
                            var progressBar = $this.closest('.inner').next().find('.progress-bar');
                            var maxWidth = $this.data('percentage');
            
                            var width = 0;
                            var interval = setInterval(function() {
                                if (width >= maxWidth) {
                                    clearInterval(interval);
                                    progressBar.css('width', maxWidth + '%');
                                    $this.text(maxWidth + '%');
                                } else {
                                    width++;
                                    progressBar.css('width', width + '%');
                                    $this.text(width + '%');
                                }
                            }, 30);
                        });
                    }
                }
            });
            
            



          
            const $section = $('#projects-section');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        $section.addClass('in-view');
                    }
                });
            }, { threshold: 0.2 });
    
            observer.observe($section[0]);
     $(window).scroll(function() {
            var scrollTopButton = $('#scrollTopButton');
                if ($(window).scrollTop() > 200) {
                    scrollTopButton.addClass('show').removeClass('hide');
                } else {
                    scrollTopButton.addClass('hide').removeClass('show');
                }
            });
            $('#scrollTopButton a').click(function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, '300');
            });
            // $("#click").click(function(e){
            //     e.preventDefault();
            //     $(".mess").css("display", "block").hide().fadeIn(5000);

            //     setTimeout(function() {
            //         $(".mess").fadeOut(500); 
            //     }, 10000);
            //     $(this).closest('form').submit();

            // })

    });
        
        
        
       
        
        
        


