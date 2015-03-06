(function ($) {
    $(document).ready(function () {

        var colorless = 0,
            manaCostTypes = {
                'white': 'W',
                'blue': 'U',
                'black': 'B',
                'red': 'R',
                'green': 'G',
                'snow': 'S',
                'colorless': 'X'
            };

        var input = $('.mana-cost-field');
        var el = input.parent();

        $.each(manaCostTypes, function (index, value) {
            el.prepend('<div class="mana-cost type-' + index + '" type="' + value + '"></div>');
        });

        $('.mana-cost').on('click', function (e) {
            var type = this.getAttribute('type');
            var val = input.val();

            if (type == 'X') {
                var matchOtherMana = val.match(/[A-Z]+/);
                var matchColorlessMana = val.match(/[0-9]+/);
                var otherMana = matchOtherMana ? matchOtherMana[0] : null;
                colorless = matchColorlessMana ? matchColorlessMana[0] : null;
                colorless++;
                input.val(colorless + otherMana);
                e.preventDefault();
                e.stopPropagation();
                return;
            }

            input.val(val + type);
        });

    });
})(jQuery);


