
$(document).ready(function () {
    const searchAjax = () => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let search = $("#inputSearchAuto").val();
            $.ajax({
                url: '/search',
                method: 'get',
                data: {
                    "search" : search
                },
                success:function(response) {
                    $("#searchResults").html(response);
                }
            })
    }
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };
    $("#inputSearchAuto").keyup(debounce(function() {
        searchAjax();
    }, 500));

})
