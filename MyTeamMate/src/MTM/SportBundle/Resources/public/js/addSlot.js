//Get the ul that holds the collection of tags
	var collectionHolder = $('ul.slots');
	
	// setup an "add a tag" link
	var $addSlotLink = $('<a href="#" class="add_slot_link">Ajouter un créneau</a>');
	var $newLinkLi = $('<li></li>').append($addSlotLink);
	
	jQuery(document).ready(function() {
	    // add the "add a slot" anchor and li to the slots ul
	    collectionHolder.append($newLinkLi);
	
	    // count the current form inputs we have (e.g. 2), use that as the new
	    // index when inserting a new item (e.g. 2)
	    collectionHolder.data('index', collectionHolder.find(':input').length);
	
	    $addTagLink.on('click', function(e) {
	        // prevent the link from creating a "#" on the URL
	        e.preventDefault();
	
	        // add a new tag form (see next code block)
	        addTagForm(collectionHolder, $newLinkLi);
	    });
	});
	function addTagForm(collectionHolder, $newLinkLi) {
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
	    var $newFormLi = $('<li></li>').append(newForm);
	    $newLinkLi.before($newFormLi);
	}