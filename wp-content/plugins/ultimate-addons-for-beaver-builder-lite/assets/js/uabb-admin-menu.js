(function($){

	/**
	 * Helper class for dealing with the builder's admin
	 * settings page.
	 *
	 * @class UABBBuilderAdminSettings
	 * @since 1.0
	 */
	UABBBuilderAdminSettings = {
		
		/**
		 * An instance of wp.media used for uploading icons.
		 *
		 * @since 1.4.6
		 * @access private
		 * @property {Object} _iconUploader
		 */
		_iconUploader: null,
	
		/**
		 * Initializes the builder's admin settings page.
		 *
		 * @since 1.0
		 * @method init
		 */ 
		init: function()
		{
			this._bind();
			this._maybeShowWelcome();
			this._initNav();
			this._initOverrides();
			this._initLicenseSettings();
			this._templatesOverrideChange();
		},
		
		/**
		 * Binds events for the builder's admin settings page.
		 *
		 * @since 1.0
		 * @access private
		 * @method _bind
		 */
		_bind: function()
		{
			$('.fl-settings-nav a').on('click', UABBBuilderAdminSettings._navClicked);
			$('.fl-override-ms-cb').on('click', UABBBuilderAdminSettings._overrideCheckboxClicked);
			$('.fl-module-all-cb').on('click', UABBBuilderAdminSettings._moduleAllCheckboxClicked);
			$('.fl-module-cb').on('click', UABBBuilderAdminSettings._moduleCheckboxClicked);
			$('input[name=fl-templates-override]').on('keyup click', UABBBuilderAdminSettings._templatesOverrideChange);
			$('input[name=fl-upload-icon]').on('click', UABBBuilderAdminSettings._showIconUploader);
			$('.fl-delete-icon-set').on('click', UABBBuilderAdminSettings._deleteCustomIconSet);
			$('#uninstall-form').on('submit', UABBBuilderAdminSettings._uninstallFormSubmit);
		},
		
		/**
		 * Show the welcome page after the license has been saved.
		 *
		 * @since 1.7.4
		 * @access private
		 * @method _maybeShowWelcome
		 */
		_maybeShowWelcome: function()
		{
			var onLicense    = 'license' == window.location.hash.replace( '#', '' ),
				isUpdated    = $( '.wrap .updated' ).length,
				licenseError = $( '.fl-license-error' ).length;
			
			if ( onLicense && isUpdated && ! licenseError ) {
				window.location.hash = 'welcome';
			}
		},
		
		/**
		 * Initializes the nav for the builder's admin settings page.
		 *
		 * @since 1.0
		 * @access private
		 * @method _initNav
		 */
		_initNav: function()
		{
			var links  = $('.fl-settings-nav a'),
				hash   = window.location.hash,
				active = hash === '' ? [] : links.filter('[href~="'+ hash +'"]');
				
			$('a.fl-active').removeClass('fl-active');
			$('.fl-settings-form').hide();
				
			if(hash === '' || active.length === 0) {
				active = links.eq(0);
			}
			
			active.addClass('fl-active');
			$('#fl-'+ active.attr('href').split('#').pop() +'-form').fadeIn();
		},
		
		/**
		 * Fires when a nav item is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _navClicked
		 */
		_navClicked: function()
		{
			if($(this).attr('href').indexOf('#') > -1) {
				$('a.fl-active').removeClass('fl-active');
				$('.fl-settings-form').hide();
				$(this).addClass('fl-active');
				$('#fl-'+ $(this).attr('href').split('#').pop() +'-form').fadeIn();
			}
		},
		
		/**
		 * Initializes the checkboxes for overriding network settings.
		 *
		 * @since 1.0
		 * @access private
		 * @method _initOverrides
		 */
		_initOverrides: function()
		{
			$('.fl-override-ms-cb').each(UABBBuilderAdminSettings._initOverride);
		},
		
		/**
		 * Initializes a checkbox for overriding network settings.
		 *
		 * @since 1.0
		 * @access private
		 * @method _initOverride
		 */
		_initOverride: function()
		{
			var cb      = $(this),
				content = cb.closest('.fl-settings-form').find('.fl-settings-form-content');
				
			if(this.checked) {
				content.show();
			}
			else {
				content.hide();
			}
		},
		
		/**
		 * Fired when a network override checkbox is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _overrideCheckboxClicked
		 */
		_overrideCheckboxClicked: function()
		{
			var cb      = $(this),
				content = cb.closest('.fl-settings-form').find('.fl-settings-form-content');
				
			if(this.checked) {
				content.show();
			}
			else {
				content.hide();
			}
		},
		
		/**
		 * Fires when the "all" checkbox in the list of enabled
		 * modules is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _moduleAllCheckboxClicked
		 */
		_moduleAllCheckboxClicked: function()
		{
			if($(this).is(':checked')) {
				$('.fl-module-cb').prop('checked', true);
			}
		},
		
		/**
		 * Fires when a checkbox in the list of enabled
		 * modules is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _moduleCheckboxClicked
		 */
		_moduleCheckboxClicked: function()
		{
			var allChecked = true;
					
			$('.fl-module-cb').each(function() {
				
				if(!$(this).is(':checked')) {
					allChecked = false;
				}
			});
			
			if(allChecked) {
				$('.fl-module-all-cb').prop('checked', true);
			}
			else {
				$('.fl-module-all-cb').prop('checked', false);
			}
		},
		
		/**
		 * @since 1.7.4
		 * @access private
		 * @method _initLicenseSettings
		 */
		_initLicenseSettings: function()
		{
			$( '.fl-new-license-form .button' ).on( 'click', UABBBuilderAdminSettings._newLicenseButtonClick );
		},
		
		/**
		 * @since 1.7.4
		 * @access private
		 * @method _newLicenseButtonClick
		 */
		_newLicenseButtonClick: function()
		{
			$( '.fl-new-license-form' ).hide();
			$( '.fl-license-form' ).show();
		},
		
		/**
		 * Fires when the templates override setting is changed.
		 *
		 * @since 1.6.3
		 * @access private
		 * @method _templatesOverrideChange
		 */
		_templatesOverrideChange: function()
		{
			var input 			= $('input[name=fl-templates-override]'),
				val 			= input.val(),
				overrideNodes 	= $( '.fl-templates-override-nodes' ),
				toggle 			= false;
				
			if ( 'checkbox' == input.attr( 'type' ) ) {
				toggle = input.is( ':checked' );
			}
			else {
				toggle = '' !== val;
			}
			
			overrideNodes.toggle( toggle );
		},
		
		/**
		 * Shows the media library lightbox for uploading icons.
		 *
		 * @since 1.4.6
		 * @access private
		 * @method _showIconUploader
		 */
		_showIconUploader: function()
		{
			if(UABBBuilderAdminSettings._iconUploader === null) {
				UABBBuilderAdminSettings._iconUploader = wp.media({
					title: UABBBuilderAdminSettingsStrings.selectFile,
					button: { text: UABBBuilderAdminSettingsStrings.selectFile },
					library : { type : 'application/zip' },
					multiple: false
				});
			}
			
			UABBBuilderAdminSettings._iconUploader.once('select', $.proxy(UABBBuilderAdminSettings._iconFileSelected, this));
			UABBBuilderAdminSettings._iconUploader.open();
		},
		
		/**
		 * Callback for when an icon set file is selected.
		 *
		 * @since 1.4.6
		 * @access private
		 * @method _iconFileSelected
		 */
		_iconFileSelected: function()
		{
			var file = UABBBuilderAdminSettings._iconUploader.state().get('selection').first().toJSON();
			
			$( 'input[name=fl-new-icon-set]' ).val( file.id );
			$( '#icons-form' ).submit();
		},
		
		/**
		 * Fires when the delete link for an icon set is clicked.
		 *
		 * @since 1.4.6
		 * @access private
		 * @method _deleteCustomIconSet
		 */
		_deleteCustomIconSet: function()
		{
			var set = $( this ).data( 'set' );
			
			$( 'input[name=fl-delete-icon-set]' ).val( set );
			$( '#icons-form' ).submit();
		},
		
		/**
		 * Fires when the uninstall button is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _uninstallFormSubmit
		 * @return {Boolean}
		 */
		_uninstallFormSubmit: function()
		{
			var result = prompt(UABBBuilderAdminSettingsStrings.uninstall.replace(/&quot;/g, '"'), '');
			
			if(result == 'uninstall') {
				return true;
			}
			
			return false;
		}
	};

	/* Initializes the builder's admin settings. */
	$(function(){
		UABBBuilderAdminSettings.init();
	});

})(jQuery);
