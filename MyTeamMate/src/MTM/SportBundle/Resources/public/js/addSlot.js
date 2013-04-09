//Get the ul that holds the collection of tags
	
	function addSlotForm(collectionHolder, $newLinkLi) {
		// Get the data-prototype explained earlier
	    var prototype = collectionHolder.data('prototype');

	    // get the new index
	    var index = collectionHolder.data('index');

	    // Replace '__name__' in the prototype's HTML to
	    // instead be a number based on how many items we have
	    var newForm = prototype.replace(/__name__/g, index);

	    // increase the index with one for the next item
	    collectionHolder.data('index', index + 1);

	    // Display the form in the page in an li, before the "Add a tag" link li
	    var $newFormLi = $('<li id="slot" ></li>').append(newForm);
	    
	    addSlotFormDeleteLink($newFormLi)
	    
	    $newLinkLi.before($newFormLi);
	}
	
	function addSlotFormDeleteLink($slotFormLi) {
	    var $removeFormA = $('<a href="#">Supprimer ce créneau</a>');
	    $slotFormLi.append($removeFormA); 

	    $removeFormA.on('click', function(e) {
	        // empêche le lien de créer un « # » dans l'URL
	        e.preventDefault();

	        // supprime l'élément li pour le formulaire de tag
	        $slotFormLi.remove();
	    });
	}