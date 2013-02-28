(function($){
	$.entwine('ss', function($){
		$('.zenautocompletefield').entwine({
			onmatch: function(){
				var self = $(this),
					suggestions = self.data('suggestions');

				if(!suggestions.length){
 					return;
				}
				
				self.autocomplete({
					source: suggestions
				});
			}
		});
	});	
})(jQuery);