var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

$(document).ready(() => {
    /* Submit disable after 1 click */
    $('[type=submit][name=submit]').on('click', (event) => {
        $(event.currentTarget).addClass('disabled');

        let text = $(event.currentTarget).text();
        let loader = '<div class="spinner-grow spinner-grow-sm"><span class="sr-only">Loading...</span></div>';
        $(event.currentTarget).html(loader);

        setTimeout(() => {
            $(event.currentTarget).removeClass('disabled');
            $(event.currentTarget).text(text);
        }, 3000);

    });

    /* Confirm delete handler */
    $('body').on('click', '[data-confirm]', (event) => {
        let message = $(event.currentTarget).attr('data-confirm');

        if(!confirm(message)) return false;
    });

    /* Custom links */
    $('[data-href]').on('click', event => {
        let url = $(event.currentTarget).data('href');

        fade_out_redirect({ url, full: true });
    });

    /* Enable tooltips everywhere */
    $('[data-toggle="tooltip"]').tooltip();

    /* Popovers */
    $('.popover-dismiss').popover({
        trigger: 'focus'
    })
});


}