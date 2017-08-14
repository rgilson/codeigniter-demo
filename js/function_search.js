window.onload = function(){
new Ajax.Autocompleter("title, "autocomplete_choices", base_url+"ajaxSearch", ());
$('function_search_form').onsubmit = function(){
	inline_results();
	return false;	
	}
}

function inline_results(){
	new Ajax.Updater('title', base_url+’ajaxSearch’, 
		(method:’post’,
		postBody: ‘slug=true&title=’+$F(’title’)));
	new Effect.Appear(‘mytext’);
}
