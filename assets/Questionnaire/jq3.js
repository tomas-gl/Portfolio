$(function(){
	$('#reponse1, #reponse2').submit(function(event) {

		// Stop la propagation par défaut
		event.preventDefault();
	  
		// Récupération des valeurs
		var $form = $(this),
			 term = $form.find( "input[name='s']" ).val(),
			 url = $form.attr( "action" );
	  
		// Envoie des données
		var posting = $.post( url, { s: term } );
	  
		// Reception des données et affichage
		posting.done(function(data) {
		  var content = $(data).find('#content');
		  $('#result').empty().append(content);
		});
	  
	  });
	$(".iconsmile").fadeIn(1000);
	$(".typed1").typed({
		strings: ["SALUT, C'EST ENERGIEMOINSCHERE.FR <br> TU ES AU BON ENDROIT SI TU VEUX ÉCONOMISER DE L’ARGENT <br> SUR TA FACTURE DE GAZ ET/OU D’ÉLECTRICITÉ"],
		// Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
		stringsElement: null,
		// typing speed
		typeSpeed: 30,
		// time before typing starts
		startDelay: 800,
		// loop
		loop: false,
		// false = infinite
		loopCount: 5,
		// show cursor
		showCursor: false,
		// character for cursor
		cursorChar: "|",
		// attribute to type (null == text)
		attr: null,
		// either html or text
		contentType: 'html',
		// call when done callback function
		callback: function() {
				$(".btn1").fadeIn(1500);
		},
		// starting callback function before each string
		preStringTyped: function() {},
		//callback for every typed string
		onStringTyped: function() {},
		// callback for reset
		resetCallback: function() {}
	});
	$(".btn1").click(function(){
		$(".btn1, .typed1, .iconsmile").fadeOut(500).promise().done(function(){
			$(".iconwink").fadeIn(1500);
			$(".progress-bar").css("width","10%");
			$(".typed2").removeAttr('style').typed({
				strings: ["FAISONS UN PEU PLUS CONNAISSANCE ! <br> TU UTILISES"],
				// Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
				stringsElement: null,
				// typing speed
				typeSpeed: 40,
				// time before typing starts
				startDelay: 800,
				// loop
				loop: false,
				// false = infinite
				loopCount: 5,
				// show cursor
				showCursor: false,
				// character for cursor
				cursorChar: "|",
				// attribute to type (null == text)
				attr: null,
				// either html or text
				contentType: 'html',
				// call when done callback function
				callback: function() {
						$(".alignbutton").css("display","inline-block");
						$(".btn2").fadeIn(1500);
				},
				// starting callback function before each string
				preStringTyped: function() {},
				//callback for every typed string
				onStringTyped: function() {},
				// callback for reset
				resetCallback: function() {}
			});
	})
})
$(".btne").click(function(){
	$(".btn2, .typed2, .iconwink").fadeOut(500).promise().done(function(){
		$(".iconsmile").fadeIn(1500);
		$(".progress-bar").css("width","15%");
		$(".typed3").removeAttr('style').typed({
			strings: ["<br> CONCERNANT L’ÉLECTRICITÉ, C’EST POUR QUEL USAGE ?"],
			// Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
			stringsElement: null,
			// typing speed
			typeSpeed: 40,
			// time before typing starts
			startDelay: 800,
			// loop
			loop: false,
			// false = infinite
			loopCount: 5,
			// show cursor
			showCursor: false,
			// character for cursor
			cursorChar: "|",
			// attribute to type (null == text)
			attr: null,
			// either html or text
			contentType: 'html',
			// call when done callback function
			callback: function() {
					$(".alignbutton").css("display","inline-block");
					$(".btn3").fadeIn(1500);
					$(".choixmultiple").fadeIn(1500);
			},
			// starting callback function before each string
			preStringTyped: function() {},
			//callback for every typed string
			onStringTyped: function() {},
			// callback for reset
			resetCallback: function() {}
		});
})
})
$(".btn-unclicked").click(function(){
	$(this).addClass(".btn-clicked")
	$(this).removeClass(".btn-unclicked")
 })
 $(".btn-clicked").click(function(){
	 $(this).removeClass(".btn-clicked")
	 $(this).addClass(".btn-unclicked")
 })

});	