
function typeFetcher(link){
    var type = window.document.getElementById('page_menu_level');
    var sel_type = type.selectedIndex;
    var sel_type_node = type.options[sel_type];
    var sel_type_value = sel_type_node.getAttribute('value');
    
    var target = document.getElementById('page_parent_node');
    var controller_url = link;
    new Ajax.Request(controller_url , {
        method: 'post',
        parameters: {"level" : sel_type_value},
        onComplete: function(cmsmenu){
            Element.hide('loading-mask');
            target.innerHTML = cmsmenu.responseText;
        }
    });
}