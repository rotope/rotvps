( function( api ) {

	// Extends our custom "marketing-agency" section.
	api.sectionConstructor['marketing-agency'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );