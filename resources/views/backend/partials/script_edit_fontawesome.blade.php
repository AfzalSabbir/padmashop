{{-- Add this as HTML --}}
{{--
  <select name="icon" id="fontawesome_" class="form-control fontawesome_"></select>
--}}

{{-- Add this as SCRIPT in "add.blade.php" & "edit.blade.php" --}}
<script type="text/javascript">

  $('.fontawesome_').select2();
  $(document).ready(function(){

    var data = [
      {
        id: 'fa fa-500px',
        text: '<span><i class="fa fa-500px"></i> fa fa-500px</span> ',
        html: '<span><i class="fa fa-500px"></i> fa fa-500px</span> ',
        title: 'fa fa-500px'
      },
      {
        id: 'fa fa-address-book',
        text: '<span><i class="fa fa-address-book"></i> fa fa-address-book</span> ',
        html: '<span><i class="fa fa-address-book"></i> fa fa-address-book</span> ',
        title: 'fa fa-address-book'
      },
      {
        id: 'fa fa-address-book-o',
        text: '<span><i class="fa fa-address-book-o"></i> fa fa-address-book-o</span> ',
        html: '<span><i class="fa fa-address-book-o"></i> fa fa-address-book-o</span> ',
        title: 'fa fa-address-book-o'
      },
      {
        id: 'fa fa-address-card',
        text: '<span><i class="fa fa-address-card"></i> fa fa-address-card</span> ',
        html: '<span><i class="fa fa-address-card"></i> fa fa-address-card</span> ',
        title: 'fa fa-address-card'
      },
      {
        id: 'fa fa-address-card-o',
        text: '<span><i class="fa fa-address-card-o"></i> fa fa-address-card-o</span> ',
        html: '<span><i class="fa fa-address-card-o"></i> fa fa-address-card-o</span> ',
        title: 'fa fa-address-card-o'
      },
      {
        id: 'fa fa-adjust',
        text: '<span><i class="fa fa-adjust"></i> fa fa-adjust</span> ',
        html: '<span><i class="fa fa-adjust"></i> fa fa-adjust</span> ',
        title: 'fa fa-adjust'
      },
      {
        id: 'fa fa-adn',
        text: '<span><i class="fa fa-adn"></i> fa fa-adn</span> ',
        html: '<span><i class="fa fa-adn"></i> fa fa-adn</span> ',
        title: 'fa fa-adn'
      },
      {
        id: 'fa fa-align-center',
        text: '<span><i class="fa fa-align-center"></i> fa fa-align-center</span> ',
        html: '<span><i class="fa fa-align-center"></i> fa fa-align-center</span> ',
        title: 'fa fa-align-center'
      },
      {
        id: 'fa fa-align-justify',
        text: '<span><i class="fa fa-align-justify"></i> fa fa-align-justify</span> ',
        html: '<span><i class="fa fa-align-justify"></i> fa fa-align-justify</span> ',
        title: 'fa fa-align-justify'
      },
      {
        id: 'fa fa-align-left',
        text: '<span><i class="fa fa-align-left"></i> fa fa-align-left</span> ',
        html: '<span><i class="fa fa-align-left"></i> fa fa-align-left</span> ',
        title: 'fa fa-align-left'
      },
      {
        id: 'fa fa-align-right',
        text: '<span><i class="fa fa-align-right"></i> fa fa-align-right</span> ',
        html: '<span><i class="fa fa-align-right"></i> fa fa-align-right</span> ',
        title: 'fa fa-align-right'
      },
      {
        id: 'fa fa-amazon',
        text: '<span><i class="fa fa-amazon"></i> fa fa-amazon</span> ',
        html: '<span><i class="fa fa-amazon"></i> fa fa-amazon</span> ',
        title: 'fa fa-amazon'
      },
      {
        id: 'fa fa-ambulance',
        text: '<span><i class="fa fa-ambulance"></i> fa fa-ambulance</span> ',
        html: '<span><i class="fa fa-ambulance"></i> fa fa-ambulance</span> ',
        title: 'fa fa-ambulance'
      },
      {
        id: 'fa fa-american-sign-language-interpreting',
        text: '<span><i class="fa fa-american-sign-language-interpreting"></i> fa fa-american-sign-language-interpreting</span> ',
        html: '<span><i class="fa fa-american-sign-language-interpreting"></i> fa fa-500px</span> ',
        title: 'fa fa-american-sign-language-interpreting'
      },
      {
        id: 'fa fa-anchor',
        text: '<span><i class="fa fa-anchor"></i> fa fa-anchor</span> ',
        html: '<span><i class="fa fa-anchor"></i> fa fa-anchor</span> ',
        title: 'fa fa-anchor'
      },
      {
        id: 'fa fa-android',
        text: '<span><i class="fa fa-android"></i> fa fa-android</span> ',
        html: '<span><i class="fa fa-android"></i> fa fa-android</span> ',
        title: 'fa fa-android'
      },
      {
        id: 'fa fa-angellist',
        text: '<span><i class="fa fa-angellist"></i> fa fa-angellist</span> ',
        html: '<span><i class="fa fa-angellist"></i> fa fa-angellist</span> ',
        title: 'fa fa-angellist'
      },
      {
        id: 'fa fa-angle-double-down',
        text: '<span><i class="fa fa-angle-double-down"></i> fa fa-angle-double-down</span> ',
        html: '<span><i class="fa fa-angle-double-down"></i> fa fa-angle-double-down</span> ',
        title: 'fa fa-angle-double-down'
      },
      {
        id: 'fa fa-angle-double-left',
        text: '<span><i class="fa fa-angle-double-left"></i> fa fa-angle-double-left</span> ',
        html: '<span><i class="fa fa-angle-double-left"></i> fa fa-angle-double-left</span> ',
        title: 'fa fa-angle-double-left'
      },
      {
        id: 'fa fa-angle-double-right',
        text: '<span><i class="fa fa-angle-double-right"></i> fa fa-angle-double-right</span> ',
        html: '<span><i class="fa fa-angle-double-right"></i> fa fa-angle-double-right</span> ',
        title: 'fa fa-angle-double-right'
      },
      {
        id: 'fa fa-angle-double-up',
        text: '<span><i class="fa fa-angle-double-up"></i> fa fa-angle-double-up</span> ',
        html: '<span><i class="fa fa-angle-double-up"></i> fa fa-angle-double-up</span> ',
        title: 'fa fa-angle-double-up'
      },
      {
        id: 'fa fa-angle-down',
        text: '<span><i class="fa fa-angle-down"></i> fa fa-angle-down</span> ',
        html: '<span><i class="fa fa-angle-down"></i> fa fa-angle-down</span> ',
        title: 'fa fa-angle-down'
      },
      {
        id: 'fa fa-angle-left',
        text: '<span><i class="fa fa-angle-left"></i> fa fa-angle-left</span> ',
        html: '<span><i class="fa fa-angle-left"></i> fa fa-angle-left</span> ',
        title: 'fa fa-angle-left'
      },
      {
        id: 'fa fa-angle-right',
        text: '<span><i class="fa fa-angle-right"></i> fa fa-angle-right</span> ',
        html: '<span><i class="fa fa-angle-right"></i> fa fa-angle-right</span> ',
        title: 'fa fa-angle-right'
      },
      {
        id: 'fa fa-angle-up',
        text: '<span><i class="fa fa-angle-up"></i> fa fa-angle-up</span> ',
        html: '<span><i class="fa fa-angle-up"></i> fa fa-angle-up</span> ',
        title: 'fa fa-angle-up'
      },
      {
        id: 'fa fa-apple',
        text: '<span><i class="fa fa-apple"></i> fa fa-apple</span> ',
        html: '<span><i class="fa fa-apple"></i> fa fa-apple</span> ',
        title: 'fa fa-apple'
      },
      {
        id: 'fa fa-archive',
        text: '<span><i class="fa fa-archive"></i> fa fa-archive</span> ',
        html: '<span><i class="fa fa-archive"></i> fa fa-archive</span> ',
        title: 'fa fa-archive'
      },
      {
        id: 'fa fa-area-chart',
        text: '<span><i class="fa fa-area-chart"></i> fa fa-area-chart</span> ',
        html: '<span><i class="fa fa-area-chart"></i> fa fa-area-chart</span> ',
        title: 'fa fa-area-chart'
      },
      {
        id: 'fa fa-arrow-circle-down',
        text: '<span><i class="fa fa-arrow-circle-down"></i> fa fa-arrow-circle-down</span> ',
        html: '<span><i class="fa fa-arrow-circle-down"></i> fa fa-arrow-circle-down</span> ',
        title: 'fa fa-arrow-circle-down'
      },
      {
        id: 'fa fa-arrow-circle-left',
        text: '<span><i class="fa fa-arrow-circle-left"></i> fa fa-arrow-circle-left</span> ',
        html: '<span><i class="fa fa-arrow-circle-left"></i> fa fa-arrow-circle-left</span> ',
        title: 'fa fa-arrow-circle-left'
      },
      {
        id: 'fa fa-arrow-circle-o-down',
        text: '<span><i class="fa fa-arrow-circle-o-down"></i> fa fa-arrow-circle-o-down</span> ',
        html: '<span><i class="fa fa-arrow-circle-o-down"></i> fa fa-arrow-circle-o-down</span> ',
        title: 'fa fa-arrow-circle-o-down'
      },
      {
        id: 'fa fa-arrow-circle-o-left',
        text: '<span><i class="fa fa-arrow-circle-o-left"></i> fa fa-arrow-circle-o-left</span> ',
        html: '<span><i class="fa fa-arrow-circle-o-left"></i> fa fa-arrow-circle-o-left</span> ',
        title: 'fa fa-arrow-circle-o-left'
      },
      {
        id: 'fa fa-arrow-circle-o-right',
        text: '<span><i class="fa fa-arrow-circle-o-right"></i> fa fa-arrow-circle-o-right</span> ',
        html: '<span><i class="fa fa-arrow-circle-o-right"></i> fa fa-arrow-circle-o-right</span> ',
        title: 'fa fa-arrow-circle-o-right'
      },
      {
        id: 'fa fa-arrow-circle-o-up',
        text: '<span><i class="fa fa-arrow-circle-o-up"></i> fa fa-arrow-circle-o-up</span> ',
        html: '<span><i class="fa fa-arrow-circle-o-up"></i> fa fa-arrow-circle-o-up</span> ',
        title: 'fa fa-arrow-circle-o-up'
      },
      {
        id: 'fa fa-arrow-circle-right',
        text: '<span><i class="fa fa-arrow-circle-right"></i> fa fa-arrow-circle-right</span> ',
        html: '<span><i class="fa fa-arrow-circle-right"></i> fa fa-arrow-circle-right</span> ',
        title: 'fa fa-arrow-circle-right'
      },
      {
        id: 'fa fa-arrow-circle-up',
        text: '<span><i class="fa fa-arrow-circle-up"></i> fa fa-arrow-circle-up</span> ',
        html: '<span><i class="fa fa-arrow-circle-up"></i> fa fa-arrow-circle-up</span> ',
        title: 'fa fa-arrow-circle-up'
      },
      {
        id: 'fa fa-arrow-down',
        text: '<span><i class="fa fa-arrow-down"></i> fa fa-arrow-down</span> ',
        html: '<span><i class="fa fa-arrow-down"></i> fa fa-arrow-down</span> ',
        title: 'fa fa-arrow-down'
      },
      {
        id: 'fa fa-arrow-left',
        text: '<span><i class="fa fa-arrow-left"></i> fa fa-arrow-left</span> ',
        html: '<span><i class="fa fa-arrow-left"></i> fa fa-arrow-left</span> ',
        title: 'fa fa-arrow-left'
      },
      {
        id: 'fa fa-arrow-right',
        text: '<span><i class="fa fa-arrow-right"></i> fa fa-arrow-right</span> ',
        html: '<span><i class="fa fa-arrow-right"></i> fa fa-arrow-right</span> ',
        title: 'fa fa-arrow-right'
      },
      {
        id: 'fa fa-arrow-up',
        text: '<span><i class="fa fa-arrow-up"></i> fa fa-arrow-up</span> ',
        html: '<span><i class="fa fa-arrow-up"></i> fa fa-arrow-up</span> ',
        title: 'fa fa-arrow-up'
      },
      {
        id: 'fa fa-arrows',
        text: '<span><i class="fa fa-arrows"></i> fa fa-arrows</span> ',
        html: '<span><i class="fa fa-arrows"></i> fa fa-arrows</span> ',
        title: 'fa fa-arrows'
      },
      {
        id: 'fa fa-arrows-alt',
        text: '<span><i class="fa fa-arrows-alt"></i> fa fa-arrows-alt</span> ',
        html: '<span><i class="fa fa-arrows-alt"></i> fa fa-arrows-alt</span> ',
        title: 'fa fa-arrows-alt'
      },
      {
        id: 'fa fa-arrows-h',
        text: '<span><i class="fa fa-arrows-h"></i> fa fa-arrows-h</span> ',
        html: '<span><i class="fa fa-arrows-h"></i> fa fa-arrows-h</span> ',
        title: 'fa fa-arrows-h'
      },
      {
        id: 'fa fa-arrows-v',
        text: '<span><i class="fa fa-arrows-v"></i> fa fa-arrows-v</span> ',
        html: '<span><i class="fa fa-arrows-v"></i> fa fa-arrows-v</span> ',
        title: 'fa fa-arrows-v'
      },
      {
        id: 'fa fa-asl-interpreting',
        text: '<span><i class="fa fa-asl-interpreting"></i> fa fa-asl-interpreting</span> ',
        html: '<span><i class="fa fa-asl-interpreting"></i> fa fa-asl-interpreting</span> ',
        title: 'fa fa-asl-interpreting'
      },
      {
        id: 'fa fa-assistive-listening-systems',
        text: '<span><i class="fa fa-assistive-listening-systems"></i> fa fa-assistive-listening-systems</span> ',
        html: '<span><i class="fa fa-assistive-listening-systems"></i> fa fa-assistive-listening-systems</span> ',
        title: 'fa fa-assistive-listening-systems'
      },
      {
        id: 'fa fa-asterisk',
        text: '<span><i class="fa fa-asterisk"></i> fa fa-asterisk</span> ',
        html: '<span><i class="fa fa-asterisk"></i> fa fa-asterisk</span> ',
        title: 'fa fa-asterisk'
      },
      {
        id: 'fa fa-at',
        text: '<span><i class="fa fa-at"></i> fa fa-at</span> ',
        html: '<span><i class="fa fa-at"></i> fa fa-at</span> ',
        title: 'fa fa-at'
      },
      {
        id: 'fa fa-audio-description',
        text: '<span><i class="fa fa-audio-description"></i> fa fa-audio-description</span> ',
        html: '<span><i class="fa fa-audio-description"></i> fa fa-audio-description</span> ',
        title: 'fa fa-audio-description'
      },
      {
        id: 'fa fa-automobile',
        text: '<span><i class="fa fa-automobile"></i> fa fa-automobile</span> ',
        html: '<span><i class="fa fa-automobile"></i> fa fa-automobile</span> ',
        title: 'fa fa-automobile'
      },
      {
        id: 'fa fa-backward',
        text: '<span><i class="fa fa-backward"></i> fa fa-backward</span> ',
        html: '<span><i class="fa fa-backward"></i> fa fa-backward</span> ',
        title: 'fa fa-backward'
      },
      {
        id: 'fa fa-balance-scale',
        text: '<span><i class="fa fa-balance-scale"></i> fa fa-balance-scale</span> ',
        html: '<span><i class="fa fa-balance-scale"></i> fa fa-balance-scale</span> ',
        title: 'fa fa-balance-scale'
      },
      {
        id: 'fa fa-ban',
        text: '<span><i class="fa fa-ban"></i> fa fa-ban</span> ',
        html: '<span><i class="fa fa-ban"></i> fa fa-ban</span> ',
        title: 'fa fa-ban'
      },
      {
        id: 'fa fa-bandcamp',
        text: '<span><i class="fa fa-bandcamp"></i> fa fa-bandcamp</span> ',
        html: '<span><i class="fa fa-bandcamp"></i> fa fa-bandcamp</span> ',
        title: 'fa fa-bandcamp'
      },
      {
        id: 'fa fa-bank',
        text: '<span><i class="fa fa-bank"></i> fa fa-bank</span> ',
        html: '<span><i class="fa fa-bank"></i> fa fa-bank</span> ',
        title: 'fa fa-bank'
      },
      {
        id: 'fa fa-bar-chart',
        text: '<span><i class="fa fa-bar-chart"></i> fa fa-bar-chart</span> ',
        html: '<span><i class="fa fa-bar-chart"></i> fa fa-bar-chart</span> ',
        title: 'fa fa-bar-chart'
      },
      {
        id: 'fa fa-bar-chart-o',
        text: '<span><i class="fa fa-bar-chart-o"></i> fa fa-bar-chart-o</span> ',
        html: '<span><i class="fa fa-bar-chart-o"></i> fa fa-bar-chart-o</span> ',
        title: 'fa fa-bar-chart-o'
      },
      {
        id: 'fa fa-barcode',
        text: '<span><i class="fa fa-barcode"></i> fa fa-barcode</span> ',
        html: '<span><i class="fa fa-barcode"></i> fa fa-barcode</span> ',
        title: 'fa fa-barcode'
      },
      {
        id: 'fa fa-bars',
        text: '<span><i class="fa fa-bars"></i> fa fa-bars</span> ',
        html: '<span><i class="fa fa-bars"></i> fa fa-bars</span> ',
        title: 'fa fa-bars'
      },
      {
        id: 'fa fa-bath',
        text: '<span><i class="fa fa-bath"></i> fa fa-bath</span> ',
        html: '<span><i class="fa fa-bath"></i> fa fa-bath</span> ',
        title: 'fa fa-bath'
      },
      {
        id: 'fa fa-bathtub',
        text: '<span><i class="fa fa-bathtub"></i> fa fa-bathtub</span> ',
        html: '<span><i class="fa fa-bathtub"></i> fa fa-bathtub</span> ',
        title: 'fa fa-bathtub'
      },
      {
        id: 'fa fa-battery',
        text: '<span><i class="fa fa-battery"></i> fa fa-battery</span> ',
        html: '<span><i class="fa fa-battery"></i> fa fa-battery</span> ',
        title: 'fa fa-battery'
      },
      {
        id: 'fa fa-battery-0',
        text: '<span><i class="fa fa-battery-0"></i> fa fa-battery-0</span> ',
        html: '<span><i class="fa fa-battery-0"></i> fa fa-battery-0</span> ',
        title: 'fa fa-battery-0'
      },
      {
        id: 'fa fa-battery-1',
        text: '<span><i class="fa fa-battery-1"></i> fa fa-battery-1</span> ',
        html: '<span><i class="fa fa-battery-1"></i> fa fa-battery-1</span> ',
        title: 'fa fa-battery-1'
      },
      {
        id: 'fa fa-battery-2',
        text: '<span><i class="fa fa-battery-2"></i> fa fa-battery-2</span> ',
        html: '<span><i class="fa fa-battery-2"></i> fa fa-battery-2</span> ',
        title: 'fa fa-battery-2'
      },
      {
        id: 'fa fa-battery-3',
        text: '<span><i class="fa fa-battery-3"></i> fa fa-battery-3</span> ',
        html: '<span><i class="fa fa-battery-3"></i> fa fa-battery-3</span> ',
        title: 'fa fa-battery-3'
      },
      {
        id: 'fa fa-battery-4',
        text: '<span><i class="fa fa-battery-4"></i> fa fa-battery-4</span> ',
        html: '<span><i class="fa fa-battery-4"></i> fa fa-battery-4</span> ',
        title: 'fa fa-battery-4'
      },
      {
        id: 'fa fa-battery-empty',
        text: '<span><i class="fa fa-battery-empty"></i> fa fa-battery-empty</span> ',
        html: '<span><i class="fa fa-battery-empty"></i> fa fa-battery-empty</span> ',
        title: 'fa fa-battery-empty'
      },
      {
        id: 'fa fa-battery-full',
        text: '<span><i class="fa fa-battery-full"></i> fa fa-battery-full</span> ',
        html: '<span><i class="fa fa-battery-full"></i> fa fa-battery-full</span> ',
        title: 'fa fa-battery-full'
      },
      {
        id: 'fa fa-battery-half',
        text: '<span><i class="fa fa-battery-half"></i> fa fa-battery-half</span> ',
        html: '<span><i class="fa fa-battery-half"></i> fa fa-battery-half</span> ',
        title: 'fa fa-battery-half'
      },
      {
        id: 'fa fa-battery-quarter',
        text: '<span><i class="fa fa-battery-quarter"></i> fa fa-battery-quarter</span> ',
        html: '<span><i class="fa fa-battery-quarter"></i> fa fa-battery-quarter</span> ',
        title: 'fa fa-battery-quarter'
      },
      {
        id: 'fa fa-battery-three-quarters',
        text: '<span><i class="fa fa-battery-three-quarters"></i> fa fa-battery-three-quarters</span> ',
        html: '<span><i class="fa fa-battery-three-quarters"></i> fa fa-battery-three-quarters</span> ',
        title: 'fa fa-battery-three-quarters'
      },
      {
        id: 'fa fa-bed',
        text: '<span><i class="fa fa-bed"></i> fa fa-bed</span> ',
        html: '<span><i class="fa fa-bed"></i> fa fa-bed</span> ',
        title: 'fa fa-bed'
      },
      {
        id: 'fa fa-beer',
        text: '<span><i class="fa fa-beer"></i> fa fa-beer</span> ',
        html: '<span><i class="fa fa-beer"></i> fa fa-beer</span> ',
        title: 'fa fa-beer'
      },
      {
        id: 'fa fa-behance',
        text: '<span><i class="fa fa-behance"></i> fa fa-behance</span> ',
        html: '<span><i class="fa fa-behance"></i> fa fa-behance</span> ',
        title: 'fa fa-behance'
      },
      {
        id: 'fa fa-behance-square',
        text: '<span><i class="fa fa-behance-square"></i> fa fa-behance-square</span> ',
        html: '<span><i class="fa fa-behance-square"></i> fa fa-behance-square</span> ',
        title: 'fa fa-behance-square'
      },
      {
        id: 'fa fa-bell',
        text: '<span><i class="fa fa-bell"></i> fa fa-bell</span> ',
        html: '<span><i class="fa fa-bell"></i> fa fa-bell</span> ',
        title: 'fa fa-bell'
      },
      {
        id: 'fa fa-bell-o',
        text: '<span><i class="fa fa-bell-o"></i> fa fa-bell-o</span> ',
        html: '<span><i class="fa fa-bell-o"></i> fa fa-bell-o</span> ',
        title: 'fa fa-bell-o'
      },
      {
        id: 'fa fa-bell-slash',
        text: '<span><i class="fa fa-bell-slash"></i> fa fa-bell-slash</span> ',
        html: '<span><i class="fa fa-bell-slash"></i> fa fa-bell-slash</span> ',
        title: 'fa fa-bell-slash'
      },
      {
        id: 'fa fa-bell-slash-o',
        text: '<span><i class="fa fa-bell-slash-o"></i> fa fa-bell-slash-o</span> ',
        html: '<span><i class="fa fa-bell-slash-o"></i> fa fa-bell-slash-o</span> ',
        title: 'fa fa-bell-slash-o'
      },
      {
        id: 'fa fa-bicycle',
        text: '<span><i class="fa fa-bicycle"></i> fa fa-bicycle</span> ',
        html: '<span><i class="fa fa-bicycle"></i> fa fa-bicycle</span> ',
        title: 'fa fa-bicycle'
      },
      {
        id: 'fa fa-binoculars',
        text: '<span><i class="fa fa-binoculars"></i> fa fa-binoculars</span> ',
        html: '<span><i class="fa fa-binoculars"></i> fa fa-binoculars</span> ',
        title: 'fa fa-binoculars'
      },
      {
        id: 'fa fa-birthday-cake',
        text: '<span><i class="fa fa-birthday-cake"></i> fa fa-birthday-cake</span> ',
        html: '<span><i class="fa fa-birthday-cake"></i> fa fa-birthday-cake</span> ',
        title: 'fa fa-birthday-cake'
      },
      {
        id: 'fa fa-bitbucket',
        text: '<span><i class="fa fa-bitbucket"></i> fa fa-bitbucket</span> ',
        html: '<span><i class="fa fa-bitbucket"></i> fa fa-bitbucket</span> ',
        title: 'fa fa-bitbucket'
      },
      {
        id: 'fa fa-bitbucket-square',
        text: '<span><i class="fa fa-bitbucket-square"></i> fa fa-bitbucket-square</span> ',
        html: '<span><i class="fa fa-bitbucket-square"></i> fa fa-bitbucket-square</span> ',
        title: 'fa fa-bitbucket-square'
      },
      {
        id: 'fa fa-bitcoin',
        text: '<span><i class="fa fa-bitcoin"></i> fa fa-bitcoin</span> ',
        html: '<span><i class="fa fa-bitcoin"></i> fa fa-bitcoin</span> ',
        title: 'fa fa-bitcoin'
      },
      {
        id: 'fa fa-black-tie',
        text: '<span><i class="fa fa-black-tie"></i> fa fa-black-tie</span> ',
        html: '<span><i class="fa fa-black-tie"></i> fa fa-black-tie</span> ',
        title: 'fa fa-black-tie'
      },
      {
        id: 'fa fa-blind',
        text: '<span><i class="fa fa-blind"></i> fa fa-blind</span> ',
        html: '<span><i class="fa fa-blind"></i> fa fa-blind</span> ',
        title: 'fa fa-blind'
      },
      {
        id: 'fa fa-bluetooth',
        text: '<span><i class="fa fa-bluetooth"></i> fa fa-bluetooth</span> ',
        html: '<span><i class="fa fa-bluetooth"></i> fa fa-bluetooth</span> ',
        title: 'fa fa-bluetooth'
      },
      {
        id: 'fa fa-bluetooth-b',
        text: '<span><i class="fa fa-bluetooth-b"></i> fa fa-bluetooth-b</span> ',
        html: '<span><i class="fa fa-bluetooth-b"></i> fa fa-bluetooth-b</span> ',
        title: 'fa fa-bluetooth-b'
      },
      {
        id: 'fa fa-bold',
        text: '<span><i class="fa fa-bold"></i> fa fa-bold</span> ',
        html: '<span><i class="fa fa-bold"></i> fa fa-bold</span> ',
        title: 'fa fa-bold'
      },
      {
        id: 'fa fa-bolt',
        text: '<span><i class="fa fa-bolt"></i> fa fa-bolt</span> ',
        html: '<span><i class="fa fa-bolt"></i> fa fa-bolt</span> ',
        title: 'fa fa-bolt'
      },
      {
        id: 'fa fa-bomb',
        text: '<span><i class="fa fa-bomb"></i> fa fa-bomb</span> ',
        html: '<span><i class="fa fa-bomb"></i> fa fa-bomb</span> ',
        title: 'fa fa-bomb'
      },
      {
        id: 'fa fa-book',
        text: '<span><i class="fa fa-book"></i> fa fa-book</span> ',
        html: '<span><i class="fa fa-book"></i> fa fa-book</span> ',
        title: 'fa fa-book'
      },
      {
        id: 'fa fa-bookmark',
        text: '<span><i class="fa fa-bookmark"></i> fa fa-bookmark</span> ',
        html: '<span><i class="fa fa-bookmark"></i> fa fa-bookmark</span> ',
        title: 'fa fa-bookmark'
      },
      {
        id: 'fa fa-bookmark-o',
        text: '<span><i class="fa fa-bookmark-o"></i> fa fa-bookmark-o</span> ',
        html: '<span><i class="fa fa-bookmark-o"></i> fa fa-bookmark-o</span> ',
        title: 'fa fa-bookmark-o'
      },
      {
        id: 'fa fa-braille',
        text: '<span><i class="fa fa-braille"></i> fa fa-braille</span> ',
        html: '<span><i class="fa fa-braille"></i> fa fa-braille</span> ',
        title: 'fa fa-braille'
      },
      {
        id: 'fa fa-briefcase',
        text: '<span><i class="fa fa-briefcase"></i> fa fa-briefcase</span> ',
        html: '<span><i class="fa fa-briefcase"></i> fa fa-briefcase</span> ',
        title: 'fa fa-briefcase'
      },
      {
        id: 'fa fa-btc',
        text: '<span><i class="fa fa-btc"></i> fa fa-btc</span> ',
        html: '<span><i class="fa fa-btc"></i> fa fa-btc</span> ',
        title: 'fa fa-btc'
      },
      {
        id: 'fa fa-bug',
        text: '<span><i class="fa fa-bug"></i> fa fa-bug</span> ',
        html: '<span><i class="fa fa-bug"></i> fa fa-bug</span> ',
        title: 'fa fa-bug'
      },
      {
        id: 'fa fa-building',
        text: '<span><i class="fa fa-building"></i> fa fa-building</span> ',
        html: '<span><i class="fa fa-building"></i> fa fa-building</span> ',
        title: 'fa fa-building'
      },
      {
        id: 'fa fa-building-o',
        text: '<span><i class="fa fa-building-o"></i> fa fa-building-o</span> ',
        html: '<span><i class="fa fa-building-o"></i> fa fa-building-o</span> ',
        title: 'fa fa-building-o'
      },
      {
        id: 'fa fa-bullhorn',
        text: '<span><i class="fa fa-bullhorn"></i> fa fa-bullhorn</span> ',
        html: '<span><i class="fa fa-bullhorn"></i> fa fa-bullhorn</span> ',
        title: 'fa fa-bullhorn'
      },
      {
        id: 'fa fa-bullseye',
        text: '<span><i class="fa fa-bullseye"></i> fa fa-bullseye</span> ',
        html: '<span><i class="fa fa-bullseye"></i> fa fa-bullseye</span> ',
        title: 'fa fa-bullseye'
      },
      {
        id: 'fa fa-bus',
        text: '<span><i class="fa fa-bus"></i> fa fa-bus</span> ',
        html: '<span><i class="fa fa-bus"></i> fa fa-bus</span> ',
        title: 'fa fa-bus'
      },
      {
        id: 'fa fa-buysellads',
        text: '<span><i class="fa fa-buysellads"></i> fa fa-buysellads</span> ',
        html: '<span><i class="fa fa-buysellads"></i> fa fa-buysellads</span> ',
        title: 'fa fa-buysellads'
      },
      {
        id: 'fa fa-cab',
        text: '<span><i class="fa fa-cab"></i> fa fa-cab</span> ',
        html: '<span><i class="fa fa-cab"></i> fa fa-cab</span> ',
        title: 'fa fa-cab'
      },
      {
        id: 'fa fa-calculator',
        text: '<span><i class="fa fa-calculator"></i> fa fa-calculator</span> ',
        html: '<span><i class="fa fa-calculator"></i> fa fa-calculator</span> ',
        title: 'fa fa-calculator'
      },
      {
        id: 'fa fa-calendar',
        text: '<span><i class="fa fa-calendar"></i> fa fa-calendar</span> ',
        html: '<span><i class="fa fa-calendar"></i> fa fa-calendar</span> ',
        title: 'fa fa-calendar'
      },
      {
        id: 'fa fa-calendar-check-o',
        text: '<span><i class="fa fa-calendar-check-o"></i> fa fa-calendar-check-o</span> ',
        html: '<span><i class="fa fa-calendar-check-o"></i> fa fa-calendar-check-o</span> ',
        title: 'fa fa-calendar-check-o'
      },
      {
        id: 'fa fa-calendar-minus-o',
        text: '<span><i class="fa fa-calendar-minus-o"></i> fa fa-calendar-minus-o</span> ',
        html: '<span><i class="fa fa-calendar-minus-o"></i> fa fa-calendar-minus-o</span> ',
        title: 'fa fa-calendar-minus-o'
      },
      {
        id: 'fa fa-calendar-o',
        text: '<span><i class="fa fa-calendar-o"></i> fa fa-calendar-o</span> ',
        html: '<span><i class="fa fa-calendar-o"></i> fa fa-calendar-o</span> ',
        title: 'fa fa-calendar-o'
      },
      {
        id: 'fa fa-calendar-plus-o',
        text: '<span><i class="fa fa-calendar-plus-o"></i> fa fa-calendar-plus-o</span> ',
        html: '<span><i class="fa fa-calendar-plus-o"></i> fa fa-calendar-plus-o</span> ',
        title: 'fa fa-calendar-plus-o'
      },
      {
        id: 'fa fa-calendar-times-o',
        text: '<span><i class="fa fa-calendar-times-o"></i> fa fa-calendar-times-o</span> ',
        html: '<span><i class="fa fa-calendar-times-o"></i> fa fa-calendar-times-o</span> ',
        title: 'fa fa-calendar-times-o'
      },
      {
        id: 'fa fa-camera',
        text: '<span><i class="fa fa-camera"></i> fa fa-camera</span> ',
        html: '<span><i class="fa fa-camera"></i> fa fa-camera</span> ',
        title: 'fa fa-camera'
      },
      {
        id: 'fa fa-camera-retro',
        text: '<span><i class="fa fa-camera-retro"></i> fa fa-camera-retro</span> ',
        html: '<span><i class="fa fa-camera-retro"></i> fa fa-camera-retro</span> ',
        title: 'fa fa-camera-retro'
      },
      {
        id: 'fa fa-car',
        text: '<span><i class="fa fa-car"></i> fa fa-car</span> ',
        html: '<span><i class="fa fa-car"></i> fa fa-car</span> ',
        title: 'fa fa-car'
      },
      {
        id: 'fa fa-caret-down',
        text: '<span><i class="fa fa-caret-down"></i> fa fa-caret-down</span> ',
        html: '<span><i class="fa fa-caret-down"></i> fa fa-caret-down</span> ',
        title: 'fa fa-caret-down'
      },
      {
        id: 'fa fa-caret-left',
        text: '<span><i class="fa fa-caret-left"></i> fa fa-caret-left</span> ',
        html: '<span><i class="fa fa-caret-left"></i> fa fa-caret-left</span> ',
        title: 'fa fa-caret-left'
      },
      {
        id: 'fa fa-caret-right',
        text: '<span><i class="fa fa-caret-right"></i> fa fa-caret-right</span> ',
        html: '<span><i class="fa fa-caret-right"></i> fa fa-caret-right</span> ',
        title: 'fa fa-caret-right'
      },
      {
        id: 'fa fa-caret-square-o-down',
        text: '<span><i class="fa fa-caret-square-o-down"></i> fa fa-caret-square-o-down</span> ',
        html: '<span><i class="fa fa-caret-square-o-down"></i> fa fa-caret-square-o-down</span> ',
        title: 'fa fa-caret-square-o-down'
      },
      {
        id: 'fa fa-caret-square-o-left',
        text: '<span><i class="fa fa-caret-square-o-left"></i> fa fa-caret-square-o-left</span> ',
        html: '<span><i class="fa fa-caret-square-o-left"></i> fa fa-caret-square-o-left</span> ',
        title: 'fa fa-caret-square-o-left'
      },
      {
        id: 'fa fa-caret-square-o-right',
        text: '<span><i class="fa fa-caret-square-o-right"></i> fa fa-caret-square-o-right</span> ',
        html: '<span><i class="fa fa-caret-square-o-right"></i> fa fa-caret-square-o-right</span> ',
        title: 'fa fa-caret-square-o-right'
      },
      {
        id: 'fa fa-caret-square-o-up',
        text: '<span><i class="fa fa-caret-square-o-up"></i> fa fa-caret-square-o-up</span> ',
        html: '<span><i class="fa fa-caret-square-o-up"></i> fa fa-caret-square-o-up</span> ',
        title: 'fa fa-caret-square-o-up'
      },
      {
        id: 'fa fa-caret-up',
        text: '<span><i class="fa fa-caret-up"></i> fa fa-caret-up</span> ',
        html: '<span><i class="fa fa-caret-up"></i> fa fa-caret-up</span> ',
        title: 'fa fa-caret-up'
      },
      {
        id: 'fa fa-cart-arrow-down',
        text: '<span><i class="fa fa-cart-arrow-down"></i> fa fa-cart-arrow-down</span> ',
        html: '<span><i class="fa fa-cart-arrow-down"></i> fa fa-cart-arrow-down</span> ',
        title: 'fa fa-cart-arrow-down'
      },
      {
        id: 'fa fa-cart-plus',
        text: '<span><i class="fa fa-cart-plus"></i> fa fa-cart-plus</span> ',
        html: '<span><i class="fa fa-cart-plus"></i> fa fa-cart-plus</span> ',
        title: 'fa fa-cart-plus'
      },
      {
        id: 'fa fa-cc',
        text: '<span><i class="fa fa-cc"></i> fa fa-cc</span> ',
        html: '<span><i class="fa fa-cc"></i> fa fa-cc</span> ',
        title: 'fa fa-cc'
      },
      {
        id: 'fa fa-cc-amex',
        text: '<span><i class="fa fa-cc-amex"></i> fa fa-cc-amex</span> ',
        html: '<span><i class="fa fa-cc-amex"></i> fa fa-cc-amex</span> ',
        title: 'fa fa-cc-amex'
      },
      {
        id: 'fa fa-cc-diners-club',
        text: '<span><i class="fa fa-cc-diners-club"></i> fa fa-cc-diners-club</span> ',
        html: '<span><i class="fa fa-cc-diners-club"></i> fa fa-cc-diners-club</span> ',
        title: 'fa fa-cc-diners-club'
      },
      {
        id: 'fa fa-cc-discover',
        text: '<span><i class="fa fa-cc-discover"></i> fa fa-cc-discover</span> ',
        html: '<span><i class="fa fa-cc-discover"></i> fa fa-cc-discover</span> ',
        title: 'fa fa-cc-discover'
      },
      {
        id: 'fa fa-cc-jcb',
        text: '<span><i class="fa fa-cc-jcb"></i> fa fa-cc-jcb</span> ',
        html: '<span><i class="fa fa-cc-jcb"></i> fa fa-cc-jcb</span> ',
        title: 'fa fa-cc-jcb'
      },
      {
        id: 'fa fa-cc-mastercard',
        text: '<span><i class="fa fa-cc-mastercard"></i> fa fa-cc-mastercard</span> ',
        html: '<span><i class="fa fa-cc-mastercard"></i> fa fa-cc-mastercard</span> ',
        title: 'fa fa-cc-mastercard'
      },
      {
        id: 'fa fa-cc-paypal',
        text: '<span><i class="fa fa-cc-paypal"></i> fa fa-cc-paypal</span> ',
        html: '<span><i class="fa fa-cc-paypal"></i> fa fa-cc-paypal</span> ',
        title: 'fa fa-cc-paypal'
      },
      {
        id: 'fa fa-cc-stripe',
        text: '<span><i class="fa fa-cc-stripe"></i> fa fa-cc-stripe</span> ',
        html: '<span><i class="fa fa-cc-stripe"></i> fa fa-cc-stripe</span> ',
        title: 'fa fa-cc-stripe'
      },
      {
        id: 'fa fa-cc-visa',
        text: '<span><i class="fa fa-cc-visa"></i> fa fa-cc-visa</span> ',
        html: '<span><i class="fa fa-cc-visa"></i> fa fa-cc-visa</span> ',
        title: 'fa fa-cc-visa'
      },
      {
        id: 'fa fa-certificate',
        text: '<span><i class="fa fa-certificate"></i> fa fa-certificate</span> ',
        html: '<span><i class="fa fa-certificate"></i> fa fa-certificate</span> ',
        title: 'fa fa-certificate'
      },
      {
        id: 'fa fa-chain',
        text: '<span><i class="fa fa-chain"></i> fa fa-chain</span> ',
        html: '<span><i class="fa fa-chain"></i> fa fa-chain</span> ',
        title: 'fa fa-chain'
      },
      {
        id: 'fa fa-chain-broken',
        text: '<span><i class="fa fa-chain-broken"></i> fa fa-chain-broken</span> ',
        html: '<span><i class="fa fa-chain-broken"></i> fa fa-chain-broken</span> ',
        title: 'fa fa-chain-broken'
      },
      {
        id: 'fa fa-check',
        text: '<span><i class="fa fa-check"></i> fa fa-check</span> ',
        html: '<span><i class="fa fa-check"></i> fa fa-check</span> ',
        title: 'fa fa-check'
      },
      {
        id: 'fa fa-check-circle',
        text: '<span><i class="fa fa-check-circle"></i> fa fa-check-circle</span> ',
        html: '<span><i class="fa fa-check-circle"></i> fa fa-check-circle</span> ',
        title: 'fa fa-check-circle'
      },
      {
        id: 'fa fa-check-circle-o',
        text: '<span><i class="fa fa-check-circle-o"></i> fa fa-check-circle-o</span> ',
        html: '<span><i class="fa fa-check-circle-o"></i> fa fa-check-circle-o</span> ',
        title: 'fa fa-check-circle-o'
      },
      {
        id: 'fa fa-check-square',
        text: '<span><i class="fa fa-check-square"></i> fa fa-check-square</span> ',
        html: '<span><i class="fa fa-check-square"></i> fa fa-check-square</span> ',
        title: 'fa fa-check-square'
      },
      {
        id: 'fa fa-check-square-o',
        text: '<span><i class="fa fa-check-square-o"></i> fa fa-check-square-o</span> ',
        html: '<span><i class="fa fa-check-square-o"></i> fa fa-check-square-o</span> ',
        title: 'fa fa-check-square-o'
      },
      {
        id: 'fa fa-chevron-circle-down',
        text: '<span><i class="fa fa-chevron-circle-down"></i> fa fa-chevron-circle-down</span> ',
        html: '<span><i class="fa fa-chevron-circle-down"></i> fa fa-chevron-circle-down</span> ',
        title: 'fa fa-chevron-circle-down'
      },
      {
        id: 'fa fa-chevron-circle-left',
        text: '<span><i class="fa fa-chevron-circle-left"></i> fa fa-chevron-circle-left</span> ',
        html: '<span><i class="fa fa-chevron-circle-left"></i> fa fa-chevron-circle-left</span> ',
        title: 'fa fa-chevron-circle-left'
      },
      {
        id: 'fa fa-chevron-circle-right',
        text: '<span><i class="fa fa-chevron-circle-right"></i> fa fa-chevron-circle-right</span> ',
        html: '<span><i class="fa fa-chevron-circle-right"></i> fa fa-chevron-circle-right</span> ',
        title: 'fa fa-chevron-circle-right'
      },
      {
        id: 'fa fa-chevron-circle-up',
        text: '<span><i class="fa fa-chevron-circle-up"></i> fa fa-chevron-circle-up</span> ',
        html: '<span><i class="fa fa-chevron-circle-up"></i> fa fa-chevron-circle-up</span> ',
        title: 'fa fa-chevron-circle-up'
      },
      {
        id: 'fa fa-chevron-down',
        text: '<span><i class="fa fa-chevron-down"></i> fa fa-chevron-down</span> ',
        html: '<span><i class="fa fa-chevron-down"></i> fa fa-chevron-down</span> ',
        title: 'fa fa-chevron-down'
      },
      {
        id: 'fa fa-chevron-left',
        text: '<span><i class="fa fa-chevron-left"></i> fa fa-chevron-left</span> ',
        html: '<span><i class="fa fa-chevron-left"></i> fa fa-chevron-left</span> ',
        title: 'fa fa-chevron-left'
      },
      {
        id: 'fa fa-chevron-right',
        text: '<span><i class="fa fa-chevron-right"></i> fa fa-chevron-right</span> ',
        html: '<span><i class="fa fa-chevron-right"></i> fa fa-chevron-right</span> ',
        title: 'fa fa-chevron-right'
      },
      {
        id: 'fa fa-chevron-up',
        text: '<span><i class="fa fa-chevron-up"></i> fa fa-chevron-up</span> ',
        html: '<span><i class="fa fa-chevron-up"></i> fa fa-chevron-up</span> ',
        title: 'fa fa-chevron-up'
      },
      {
        id: 'fa fa-child',
        text: '<span><i class="fa fa-child"></i> fa fa-child</span> ',
        html: '<span><i class="fa fa-child"></i> fa fa-child</span> ',
        title: 'fa fa-child'
      },
      {
        id: 'fa fa-chrome',
        text: '<span><i class="fa fa-chrome"></i> fa fa-chrome</span> ',
        html: '<span><i class="fa fa-chrome"></i> fa fa-chrome</span> ',
        title: 'fa fa-chrome'
      },
      {
        id: 'fa fa-circle',
        text: '<span><i class="fa fa-circle"></i> fa fa-circle</span> ',
        html: '<span><i class="fa fa-circle"></i> fa fa-circle</span> ',
        title: 'fa fa-circle'
      },
      {
        id: 'fa fa-circle-o',
        text: '<span><i class="fa fa-circle-o"></i> fa fa-circle-o</span> ',
        html: '<span><i class="fa fa-circle-o"></i> fa fa-circle-o</span> ',
        title: 'fa fa-circle-o'
      },
      {
        id: 'fa fa-circle-o-notch',
        text: '<span><i class="fa fa-circle-o-notch"></i> fa fa-circle-o-notch</span> ',
        html: '<span><i class="fa fa-circle-o-notch"></i> fa fa-circle-o-notch</span> ',
        title: 'fa fa-circle-o-notch'
      },
      {
        id: 'fa fa-circle-thin',
        text: '<span><i class="fa fa-circle-thin"></i> fa fa-circle-thin</span> ',
        html: '<span><i class="fa fa-circle-thin"></i> fa fa-circle-thin</span> ',
        title: 'fa fa-circle-thin'
      },
      {
        id: 'fa fa-clipboard',
        text: '<span><i class="fa fa-clipboard"></i> fa fa-clipboard</span> ',
        html: '<span><i class="fa fa-clipboard"></i> fa fa-clipboard</span> ',
        title: 'fa fa-clipboard'
      },
      {
        id: 'fa fa-clock-o',
        text: '<span><i class="fa fa-clock-o"></i> fa fa-clock-o</span> ',
        html: '<span><i class="fa fa-clock-o"></i> fa fa-clock-o</span> ',
        title: 'fa fa-clock-o'
      },
      {
        id: 'fa fa-clone',
        text: '<span><i class="fa fa-clone"></i> fa fa-clone</span> ',
        html: '<span><i class="fa fa-clone"></i> fa fa-clone</span> ',
        title: 'fa fa-clone'
      },
      {
        id: 'fa fa-close',
        text: '<span><i class="fa fa-close"></i> fa fa-close</span> ',
        html: '<span><i class="fa fa-close"></i> fa fa-close</span> ',
        title: 'fa fa-close'
      },
      {
        id: 'fa fa-cloud',
        text: '<span><i class="fa fa-cloud"></i> fa fa-cloud</span> ',
        html: '<span><i class="fa fa-cloud"></i> fa fa-cloud</span> ',
        title: 'fa fa-cloud'
      },
      {
        id: 'fa fa-cloud-download',
        text: '<span><i class="fa fa-cloud-download"></i> fa fa-cloud-download</span> ',
        html: '<span><i class="fa fa-cloud-download"></i> fa fa-cloud-download</span> ',
        title: 'fa fa-cloud-download'
      },
      {
        id: 'fa fa-cloud-upload',
        text: '<span><i class="fa fa-cloud-upload"></i> fa fa-cloud-upload</span> ',
        html: '<span><i class="fa fa-cloud-upload"></i> fa fa-cloud-upload</span> ',
        title: 'fa fa-cloud-upload'
      },
      {
        id: 'fa fa-cny',
        text: '<span><i class="fa fa-cny"></i> fa fa-cny</span> ',
        html: '<span><i class="fa fa-cny"></i> fa fa-cny</span> ',
        title: 'fa fa-cny'
      },
      {
        id: 'fa fa-code',
        text: '<span><i class="fa fa-code"></i> fa fa-code</span> ',
        html: '<span><i class="fa fa-code"></i> fa fa-code</span> ',
        title: 'fa fa-code'
      },
      {
        id: 'fa fa-code-fork',
        text: '<span><i class="fa fa-code-fork"></i> fa fa-code-fork</span> ',
        html: '<span><i class="fa fa-code-fork"></i> fa fa-code-fork</span> ',
        title: 'fa fa-code-fork'
      },
      {
        id: 'fa fa-codepen',
        text: '<span><i class="fa fa-codepen"></i> fa fa-codepen</span> ',
        html: '<span><i class="fa fa-codepen"></i> fa fa-codepen</span> ',
        title: 'fa fa-codepen'
      },
      {
        id: 'fa fa-codiepie',
        text: '<span><i class="fa fa-codiepie"></i> fa fa-codiepie</span> ',
        html: '<span><i class="fa fa-codiepie"></i> fa fa-codiepie</span> ',
        title: 'fa fa-codiepie'
      },
      {
        id: 'fa fa-coffee',
        text: '<span><i class="fa fa-coffee"></i> fa fa-coffee</span> ',
        html: '<span><i class="fa fa-coffee"></i> fa fa-coffee</span> ',
        title: 'fa fa-coffee'
      },
      {
        id: 'fa fa-cog',
        text: '<span><i class="fa fa-cog"></i> fa fa-cog</span> ',
        html: '<span><i class="fa fa-cog"></i> fa fa-cog</span> ',
        title: 'fa fa-cog'
      },
      {
        id: 'fa fa-cogs',
        text: '<span><i class="fa fa-cogs"></i> fa fa-cogs</span> ',
        html: '<span><i class="fa fa-cogs"></i> fa fa-cogs</span> ',
        title: 'fa fa-cogs'
      },
      {
        id: 'fa fa-columns',
        text: '<span><i class="fa fa-columns"></i> fa fa-columns</span> ',
        html: '<span><i class="fa fa-columns"></i> fa fa-columns</span> ',
        title: 'fa fa-columns'
      },
      {
        id: 'fa fa-comment',
        text: '<span><i class="fa fa-comment"></i> fa fa-comment</span> ',
        html: '<span><i class="fa fa-comment"></i> fa fa-comment</span> ',
        title: 'fa fa-comment'
      },
      {
        id: 'fa fa-comment-o',
        text: '<span><i class="fa fa-comment-o"></i> fa fa-comment-o</span> ',
        html: '<span><i class="fa fa-comment-o"></i> fa fa-comment-o</span> ',
        title: 'fa fa-comment-o'
      },
      {
        id: 'fa fa-commenting',
        text: '<span><i class="fa fa-commenting"></i> fa fa-commenting</span> ',
        html: '<span><i class="fa fa-commenting"></i> fa fa-commenting</span> ',
        title: 'fa fa-commenting'
      },
      {
        id: 'fa fa-commenting-o',
        text: '<span><i class="fa fa-commenting-o"></i> fa fa-commenting-o</span> ',
        html: '<span><i class="fa fa-commenting-o"></i> fa fa-commenting-o</span> ',
        title: 'fa fa-commenting-o'
      },
      {
        id: 'fa fa-comments',
        text: '<span><i class="fa fa-comments"></i> fa fa-comments</span> ',
        html: '<span><i class="fa fa-comments"></i> fa fa-comments</span> ',
        title: 'fa fa-comments'
      },
      {
        id: 'fa fa-comments-o',
        text: '<span><i class="fa fa-comments-o"></i> fa fa-comments-o</span> ',
        html: '<span><i class="fa fa-comments-o"></i> fa fa-comments-o</span> ',
        title: 'fa fa-comments-o'
      },
      {
        id: 'fa fa-compass',
        text: '<span><i class="fa fa-compass"></i> fa fa-compass</span> ',
        html: '<span><i class="fa fa-compass"></i> fa fa-compass</span> ',
        title: 'fa fa-compass'
      },
      {
        id: 'fa fa-compress',
        text: '<span><i class="fa fa-compress"></i> fa fa-compress</span> ',
        html: '<span><i class="fa fa-compress"></i> fa fa-compress</span> ',
        title: 'fa fa-compress'
      },
      {
        id: 'fa fa-connectdevelop',
        text: '<span><i class="fa fa-connectdevelop"></i> fa fa-connectdevelop</span> ',
        html: '<span><i class="fa fa-connectdevelop"></i> fa fa-connectdevelop</span> ',
        title: 'fa fa-connectdevelop'
      },
      {
        id: 'fa fa-contao',
        text: '<span><i class="fa fa-contao"></i> fa fa-contao</span> ',
        html: '<span><i class="fa fa-contao"></i> fa fa-contao</span> ',
        title: 'fa fa-contao'
      },
      {
        id: 'fa fa-copy',
        text: '<span><i class="fa fa-copy"></i> fa fa-copy</span> ',
        html: '<span><i class="fa fa-copy"></i> fa fa-copy</span> ',
        title: 'fa fa-copy'
      },
      {
        id: 'fa fa-copyright',
        text: '<span><i class="fa fa-copyright"></i> fa fa-copyright</span> ',
        html: '<span><i class="fa fa-copyright"></i> fa fa-copyright</span> ',
        title: 'fa fa-copyright'
      },
      {
        id: 'fa fa-creative-commons',
        text: '<span><i class="fa fa-creative-commons"></i> fa fa-creative-commons</span> ',
        html: '<span><i class="fa fa-creative-commons"></i> fa fa-creative-commons</span> ',
        title: 'fa fa-creative-commons'
      },
      {
        id: 'fa fa-credit-card',
        text: '<span><i class="fa fa-credit-card"></i> fa fa-credit-card</span> ',
        html: '<span><i class="fa fa-credit-card"></i> fa fa-credit-card</span> ',
        title: 'fa fa-credit-card'
      },
      {
        id: 'fa fa-credit-card-alt',
        text: '<span><i class="fa fa-credit-card-alt"></i> fa fa-credit-card-alt</span> ',
        html: '<span><i class="fa fa-credit-card-alt"></i> fa fa-credit-card-alt</span> ',
        title: 'fa fa-credit-card-alt'
      },
      {
        id: 'fa fa-crop',
        text: '<span><i class="fa fa-crop"></i> fa fa-crop</span> ',
        html: '<span><i class="fa fa-crop"></i> fa fa-crop</span> ',
        title: 'fa fa-crop'
      },
      {
        id: 'fa fa-crosshairs',
        text: '<span><i class="fa fa-crosshairs"></i> fa fa-crosshairs</span> ',
        html: '<span><i class="fa fa-crosshairs"></i> fa fa-crosshairs</span> ',
        title: 'fa fa-crosshairs'
      },
      {
        id: 'fa fa-css3',
        text: '<span><i class="fa fa-css3"></i> fa fa-css3</span> ',
        html: '<span><i class="fa fa-css3"></i> fa fa-css3</span> ',
        title: 'fa fa-css3'
      },
      {
        id: 'fa fa-cube',
        text: '<span><i class="fa fa-cube"></i> fa fa-cube</span> ',
        html: '<span><i class="fa fa-cube"></i> fa fa-cube</span> ',
        title: 'fa fa-cube'
      },
      {
        id: 'fa fa-cubes',
        text: '<span><i class="fa fa-cubes"></i> fa fa-cubes</span> ',
        html: '<span><i class="fa fa-cubes"></i> fa fa-cubes</span> ',
        title: 'fa fa-cubes'
      },
      {
        id: 'fa fa-cut',
        text: '<span><i class="fa fa-cut"></i> fa fa-cut</span> ',
        html: '<span><i class="fa fa-cut"></i> fa fa-cut</span> ',
        title: 'fa fa-cut'
      },
      {
        id: 'fa fa-cutlery',
        text: '<span><i class="fa fa-cutlery"></i> fa fa-cutlery</span> ',
        html: '<span><i class="fa fa-cutlery"></i> fa fa-cutlery</span> ',
        title: 'fa fa-cutlery'
      },
      {
        id: 'fa fa-dashboard',
        text: '<span><i class="fa fa-dashboard"></i> fa fa-dashboard</span> ',
        html: '<span><i class="fa fa-dashboard"></i> fa fa-dashboard</span> ',
        title: 'fa fa-dashboard'
      },
      {
        id: 'fa fa-dashcube',
        text: '<span><i class="fa fa-dashcube"></i> fa fa-dashcube</span> ',
        html: '<span><i class="fa fa-dashcube"></i> fa fa-dashcube</span> ',
        title: 'fa fa-dashcube'
      },
      {
        id: 'fa fa-database',
        text: '<span><i class="fa fa-database"></i> fa fa-database</span> ',
        html: '<span><i class="fa fa-database"></i> fa fa-database</span> ',
        title: 'fa fa-database'
      },
      {
        id: 'fa fa-deaf',
        text: '<span><i class="fa fa-deaf"></i> fa fa-deaf</span> ',
        html: '<span><i class="fa fa-deaf"></i> fa fa-deaf</span> ',
        title: 'fa fa-deaf'
      },
      {
        id: 'fa fa-deafness',
        text: '<span><i class="fa fa-deafness"></i> fa fa-deafness</span> ',
        html: '<span><i class="fa fa-deafness"></i> fa fa-deafness</span> ',
        title: 'fa fa-deafness'
      },
      {
        id: 'fa fa-dedent',
        text: '<span><i class="fa fa-dedent"></i> fa fa-dedent</span> ',
        html: '<span><i class="fa fa-dedent"></i> fa fa-dedent</span> ',
        title: 'fa fa-dedent'
      },
      {
        id: 'fa fa-delicious',
        text: '<span><i class="fa fa-delicious"></i> fa fa-delicious</span> ',
        html: '<span><i class="fa fa-delicious"></i> fa fa-delicious</span> ',
        title: 'fa fa-delicious'
      },
      {
        id: 'fa fa-desktop',
        text: '<span><i class="fa fa-desktop"></i> fa fa-desktop</span> ',
        html: '<span><i class="fa fa-desktop"></i> fa fa-desktop</span> ',
        title: 'fa fa-desktop'
      },
      {
        id: 'fa fa-deviantart',
        text: '<span><i class="fa fa-deviantart"></i> fa fa-deviantart</span> ',
        html: '<span><i class="fa fa-deviantart"></i> fa fa-deviantart</span> ',
        title: 'fa fa-deviantart'
      },
      {
        id: 'fa fa-diamond',
        text: '<span><i class="fa fa-diamond"></i> fa fa-diamond</span> ',
        html: '<span><i class="fa fa-diamond"></i> fa fa-diamond</span> ',
        title: 'fa fa-diamond'
      },
      {
        id: 'fa fa-digg',
        text: '<span><i class="fa fa-digg"></i> fa fa-digg</span> ',
        html: '<span><i class="fa fa-digg"></i> fa fa-digg</span> ',
        title: 'fa fa-digg'
      },
      {
        id: 'fa fa-dollar',
        text: '<span><i class="fa fa-dollar"></i> fa fa-dollar</span> ',
        html: '<span><i class="fa fa-dollar"></i> fa fa-dollar</span> ',
        title: 'fa fa-dollar'
      },
      {
        id: 'fa fa-dot-circle-o',
        text: '<span><i class="fa fa-dot-circle-o"></i> fa fa-dot-circle-o</span> ',
        html: '<span><i class="fa fa-dot-circle-o"></i> fa fa-dot-circle-o</span> ',
        title: 'fa fa-dot-circle-o'
      },
      {
        id: 'fa fa-download',
        text: '<span><i class="fa fa-download"></i> fa fa-download</span> ',
        html: '<span><i class="fa fa-download"></i> fa fa-download</span> ',
        title: 'fa fa-download'
      },
      {
        id: 'fa fa-dribbble',
        text: '<span><i class="fa fa-dribbble"></i> fa fa-dribbble</span> ',
        html: '<span><i class="fa fa-dribbble"></i> fa fa-dribbble</span> ',
        title: 'fa fa-dribbble'
      },
      {
        id: 'fa fa-drivers-license',
        text: '<span><i class="fa fa-drivers-license"></i> fa fa-drivers-license</span> ',
        html: '<span><i class="fa fa-drivers-license"></i> fa fa-drivers-license</span> ',
        title: 'fa fa-drivers-license'
      },
      {
        id: 'fa fa-drivers-license-o',
        text: '<span><i class="fa fa-drivers-license-o"></i> fa fa-drivers-license-o</span> ',
        html: '<span><i class="fa fa-drivers-license-o"></i> fa fa-drivers-license-o</span> ',
        title: 'fa fa-drivers-license-o'
      },
      {
        id: 'fa fa-dropbox',
        text: '<span><i class="fa fa-dropbox"></i> fa fa-dropbox</span> ',
        html: '<span><i class="fa fa-dropbox"></i> fa fa-dropbox</span> ',
        title: 'fa fa-dropbox'
      },
      {
        id: 'fa fa-drupal',
        text: '<span><i class="fa fa-drupal"></i> fa fa-drupal</span> ',
        html: '<span><i class="fa fa-drupal"></i> fa fa-drupal</span> ',
        title: 'fa fa-drupal'
      },
      {
        id: 'fa fa-edge',
        text: '<span><i class="fa fa-edge"></i> fa fa-edge</span> ',
        html: '<span><i class="fa fa-edge"></i> fa fa-edge</span> ',
        title: 'fa fa-edge'
      },
      {
        id: 'fa fa-edit',
        text: '<span><i class="fa fa-edit"></i> fa fa-edit</span> ',
        html: '<span><i class="fa fa-edit"></i> fa fa-edit</span> ',
        title: 'fa fa-edit'
      },
      {
        id: 'fa fa-eercast',
        text: '<span><i class="fa fa-eercast"></i> fa fa-eercast</span> ',
        html: '<span><i class="fa fa-eercast"></i> fa fa-eercast</span> ',
        title: 'fa fa-eercast'
      },
      {
        id: 'fa fa-eject',
        text: '<span><i class="fa fa-eject"></i> fa fa-eject</span> ',
        html: '<span><i class="fa fa-eject"></i> fa fa-eject</span> ',
        title: 'fa fa-eject'
      },
      {
        id: 'fa fa-ellipsis-h',
        text: '<span><i class="fa fa-ellipsis-h"></i> fa fa-ellipsis-h</span> ',
        html: '<span><i class="fa fa-ellipsis-h"></i> fa fa-ellipsis-h</span> ',
        title: 'fa fa-ellipsis-h'
      },
      {
        id: 'fa fa-ellipsis-v',
        text: '<span><i class="fa fa-ellipsis-v"></i> fa fa-ellipsis-v</span> ',
        html: '<span><i class="fa fa-ellipsis-v"></i> fa fa-ellipsis-v</span> ',
        title: 'fa fa-ellipsis-v'
      },
      {
        id: 'fa fa-empire',
        text: '<span><i class="fa fa-empire"></i> fa fa-empire</span> ',
        html: '<span><i class="fa fa-empire"></i> fa fa-empire</span> ',
        title: 'fa fa-empire'
      },
      {
        id: 'fa fa-envelope',
        text: '<span><i class="fa fa-envelope"></i> fa fa-envelope</span> ',
        html: '<span><i class="fa fa-envelope"></i> fa fa-envelope</span> ',
        title: 'fa fa-envelope'
      },
      {
        id: 'fa fa-envelope-o',
        text: '<span><i class="fa fa-envelope-o"></i> fa fa-envelope-o</span> ',
        html: '<span><i class="fa fa-envelope-o"></i> fa fa-envelope-o</span> ',
        title: 'fa fa-envelope-o'
      },
      {
        id: 'fa fa-envelope-open',
        text: '<span><i class="fa fa-envelope-open"></i> fa fa-envelope-open</span> ',
        html: '<span><i class="fa fa-envelope-open"></i> fa fa-envelope-open</span> ',
        title: 'fa fa-envelope-open'
      },
      {
        id: 'fa fa-envelope-open-o',
        text: '<span><i class="fa fa-envelope-open-o"></i> fa fa-envelope-open-o</span> ',
        html: '<span><i class="fa fa-envelope-open-o"></i> fa fa-envelope-open-o</span> ',
        title: 'fa fa-envelope-open-o'
      },
      {
        id: 'fa fa-envelope-square',
        text: '<span><i class="fa fa-envelope-square"></i> fa fa-envelope-square</span> ',
        html: '<span><i class="fa fa-envelope-square"></i> fa fa-envelope-square</span> ',
        title: 'fa fa-envelope-square'
      },
      {
        id: 'fa fa-envira',
        text: '<span><i class="fa fa-envira"></i> fa fa-envira</span> ',
        html: '<span><i class="fa fa-envira"></i> fa fa-envira</span> ',
        title: 'fa fa-envira'
      },
      {
        id: 'fa fa-eraser',
        text: '<span><i class="fa fa-eraser"></i> fa fa-eraser</span> ',
        html: '<span><i class="fa fa-eraser"></i> fa fa-eraser</span> ',
        title: 'fa fa-eraser'
      },
      {
        id: 'fa fa-etsy',
        text: '<span><i class="fa fa-etsy"></i> fa fa-etsy</span> ',
        html: '<span><i class="fa fa-etsy"></i> fa fa-etsy</span> ',
        title: 'fa fa-etsy'
      },
      {
        id: 'fa fa-eur',
        text: '<span><i class="fa fa-eur"></i> fa fa-eur</span> ',
        html: '<span><i class="fa fa-eur"></i> fa fa-eur</span> ',
        title: 'fa fa-eur'
      },
      {
        id: 'fa fa-euro',
        text: '<span><i class="fa fa-euro"></i> fa fa-euro</span> ',
        html: '<span><i class="fa fa-euro"></i> fa fa-euro</span> ',
        title: 'fa fa-euro'
      },
      {
        id: 'fa fa-exchange',
        text: '<span><i class="fa fa-exchange"></i> fa fa-exchange</span> ',
        html: '<span><i class="fa fa-exchange"></i> fa fa-exchange</span> ',
        title: 'fa fa-exchange'
      },
      {
        id: 'fa fa-exclamation',
        text: '<span><i class="fa fa-exclamation"></i> fa fa-exclamation</span> ',
        html: '<span><i class="fa fa-exclamation"></i> fa fa-exclamation</span> ',
        title: 'fa fa-exclamation'
      },
      {
        id: 'fa fa-exclamation-circle',
        text: '<span><i class="fa fa-exclamation-circle"></i> fa fa-exclamation-circle</span> ',
        html: '<span><i class="fa fa-exclamation-circle"></i> fa fa-exclamation-circle</span> ',
        title: 'fa fa-exclamation-circle'
      },
      {
        id: 'fa fa-exclamation-triangle',
        text: '<span><i class="fa fa-exclamation-triangle"></i> fa fa-exclamation-triangle</span> ',
        html: '<span><i class="fa fa-exclamation-triangle"></i> fa fa-exclamation-triangle</span> ',
        title: 'fa fa-exclamation-triangle'
      },
      {
        id: 'fa fa-expand',
        text: '<span><i class="fa fa-expand"></i> fa fa-expand</span> ',
        html: '<span><i class="fa fa-expand"></i> fa fa-expand</span> ',
        title: 'fa fa-expand'
      },
      {
        id: 'fa fa-expeditedssl',
        text: '<span><i class="fa fa-expeditedssl"></i> fa fa-expeditedssl</span> ',
        html: '<span><i class="fa fa-expeditedssl"></i> fa fa-expeditedssl</span> ',
        title: 'fa fa-expeditedssl'
      },
      {
        id: 'fa fa-external-link',
        text: '<span><i class="fa fa-external-link"></i> fa fa-external-link</span> ',
        html: '<span><i class="fa fa-external-link"></i> fa fa-external-link</span> ',
        title: 'fa fa-external-link'
      },
      {
        id: 'fa fa-external-link-square',
        text: '<span><i class="fa fa-external-link-square"></i> fa fa-external-link-square</span> ',
        html: '<span><i class="fa fa-external-link-square"></i> fa fa-external-link-square</span> ',
        title: 'fa fa-external-link-square'
      },
      {
        id: 'fa fa-eye',
        text: '<span><i class="fa fa-eye"></i> fa fa-eye</span> ',
        html: '<span><i class="fa fa-eye"></i> fa fa-eye</span> ',
        title: 'fa fa-eye'
      },
      {
        id: 'fa fa-eye-slash',
        text: '<span><i class="fa fa-eye-slash"></i> fa fa-eye-slash</span> ',
        html: '<span><i class="fa fa-eye-slash"></i> fa fa-eye-slash</span> ',
        title: 'fa fa-eye-slash'
      },
      {
        id: 'fa fa-eyedropper',
        text: '<span><i class="fa fa-eyedropper"></i> fa fa-eyedropper</span> ',
        html: '<span><i class="fa fa-eyedropper"></i> fa fa-eyedropper</span> ',
        title: 'fa fa-eyedropper'
      },
      {
        id: 'fa fa-fa',
        text: '<span><i class="fa fa-fa"></i> fa fa-fa</span> ',
        html: '<span><i class="fa fa-fa"></i> fa fa-fa</span> ',
        title: 'fa fa-fa'
      },
      {
        id: 'fa fa-facebook',
        text: '<span><i class="fa fa-facebook"></i> fa fa-facebook</span> ',
        html: '<span><i class="fa fa-facebook"></i> fa fa-facebook</span> ',
        title: 'fa fa-facebook'
      },
      {
        id: 'fa fa-facebook-f',
        text: '<span><i class="fa fa-facebook-f"></i> fa fa-facebook-f</span> ',
        html: '<span><i class="fa fa-facebook-f"></i> fa fa-facebook-f</span> ',
        title: 'fa fa-facebook-f'
      },
      {
        id: 'fa fa-facebook-official',
        text: '<span><i class="fa fa-facebook-official"></i> fa fa-facebook-official</span> ',
        html: '<span><i class="fa fa-facebook-official"></i> fa fa-facebook-official</span> ',
        title: 'fa fa-facebook-official'
      },
      {
        id: 'fa fa-facebook-square',
        text: '<span><i class="fa fa-facebook-square"></i> fa fa-facebook-square</span> ',
        html: '<span><i class="fa fa-facebook-square"></i> fa fa-facebook-square</span> ',
        title: 'fa fa-facebook-square'
      },
      {
        id: 'fa fa-fast-backward',
        text: '<span><i class="fa fa-fast-backward"></i> fa fa-fast-backward</span> ',
        html: '<span><i class="fa fa-fast-backward"></i> fa fa-fast-backward</span> ',
        title: 'fa fa-fast-backward'
      },
      {
        id: 'fa fa-fast-forward',
        text: '<span><i class="fa fa-fast-forward"></i> fa fa-fast-forward</span> ',
        html: '<span><i class="fa fa-fast-forward"></i> fa fa-fast-forward</span> ',
        title: 'fa fa-fast-forward'
      },
      {
        id: 'fa fa-fax',
        text: '<span><i class="fa fa-fax"></i> fa fa-fax</span> ',
        html: '<span><i class="fa fa-fax"></i> fa fa-fax</span> ',
        title: 'fa fa-fax'
      },
      {
        id: 'fa fa-feed',
        text: '<span><i class="fa fa-feed"></i> fa fa-feed</span> ',
        html: '<span><i class="fa fa-feed"></i> fa fa-feed</span> ',
        title: 'fa fa-feed'
      },
      {
        id: 'fa fa-female',
        text: '<span><i class="fa fa-female"></i> fa fa-female</span> ',
        html: '<span><i class="fa fa-female"></i> fa fa-female</span> ',
        title: 'fa fa-female'
      },
      {
        id: 'fa fa-fighter-jet',
        text: '<span><i class="fa fa-fighter-jet"></i> fa fa-fighter-jet</span> ',
        html: '<span><i class="fa fa-fighter-jet"></i> fa fa-fighter-jet</span> ',
        title: 'fa fa-fighter-jet'
      },
      {
        id: 'fa fa-file',
        text: '<span><i class="fa fa-file"></i> fa fa-file</span> ',
        html: '<span><i class="fa fa-file"></i> fa fa-file</span> ',
        title: 'fa fa-file'
      },
      {
        id: 'fa fa-file-archive-o',
        text: '<span><i class="fa fa-file-archive-o"></i> fa fa-file-archive-o</span> ',
        html: '<span><i class="fa fa-file-archive-o"></i> fa fa-file-archive-o</span> ',
        title: 'fa fa-file-archive-o'
      },
      {
        id: 'fa fa-file-audio-o',
        text: '<span><i class="fa fa-file-audio-o"></i> fa fa-file-audio-o</span> ',
        html: '<span><i class="fa fa-file-audio-o"></i> fa fa-file-audio-o</span> ',
        title: 'fa fa-file-audio-o'
      },
      {
        id: 'fa fa-file-code-o',
        text: '<span><i class="fa fa-file-code-o"></i> fa fa-file-code-o</span> ',
        html: '<span><i class="fa fa-file-code-o"></i> fa fa-file-code-o</span> ',
        title: 'fa fa-file-code-o'
      },
      {
        id: 'fa fa-file-excel-o',
        text: '<span><i class="fa fa-file-excel-o"></i> fa fa-file-excel-o</span> ',
        html: '<span><i class="fa fa-file-excel-o"></i> fa fa-file-excel-o</span> ',
        title: 'fa fa-file-excel-o'
      },
      {
        id: 'fa fa-file-image-o',
        text: '<span><i class="fa fa-file-image-o"></i> fa fa-file-image-o</span> ',
        html: '<span><i class="fa fa-file-image-o"></i> fa fa-file-image-o</span> ',
        title: 'fa fa-file-image-o'
      },
      {
        id: 'fa fa-file-movie-o',
        text: '<span><i class="fa fa-file-movie-o"></i> fa fa-file-movie-o</span> ',
        html: '<span><i class="fa fa-file-movie-o"></i> fa fa-file-movie-o</span> ',
        title: 'fa fa-file-movie-o'
      },
      {
        id: 'fa fa-file-o',
        text: '<span><i class="fa fa-file-o"></i> fa fa-file-o</span> ',
        html: '<span><i class="fa fa-file-o"></i> fa fa-file-o</span> ',
        title: 'fa fa-file-o'
      },
      {
        id: 'fa fa-file-pdf-o',
        text: '<span><i class="fa fa-file-pdf-o"></i> fa fa-file-pdf-o</span> ',
        html: '<span><i class="fa fa-file-pdf-o"></i> fa fa-file-pdf-o</span> ',
        title: 'fa fa-file-pdf-o'
      },
      {
        id: 'fa fa-file-photo-o',
        text: '<span><i class="fa fa-file-photo-o"></i> fa fa-file-photo-o</span> ',
        html: '<span><i class="fa fa-file-photo-o"></i> fa fa-file-photo-o</span> ',
        title: 'fa fa-file-photo-o'
      },
      {
        id: 'fa fa-file-picture-o',
        text: '<span><i class="fa fa-file-picture-o"></i> fa fa-file-picture-o</span> ',
        html: '<span><i class="fa fa-file-picture-o"></i> fa fa-file-picture-o</span> ',
        title: 'fa fa-file-picture-o'
      },
      {
        id: 'fa fa-file-powerpoint-o',
        text: '<span><i class="fa fa-file-powerpoint-o"></i> fa fa-file-powerpoint-o</span> ',
        html: '<span><i class="fa fa-file-powerpoint-o"></i> fa fa-file-powerpoint-o</span> ',
        title: 'fa fa-file-powerpoint-o'
      },
      {
        id: 'fa fa-file-sound-o',
        text: '<span><i class="fa fa-file-sound-o"></i> fa fa-file-sound-o</span> ',
        html: '<span><i class="fa fa-file-sound-o"></i> fa fa-file-sound-o</span> ',
        title: 'fa fa-file-sound-o'
      },
      {
        id: 'fa fa-file-text',
        text: '<span><i class="fa fa-file-text"></i> fa fa-file-text</span> ',
        html: '<span><i class="fa fa-file-text"></i> fa fa-file-text</span> ',
        title: 'fa fa-file-text'
      },
      {
        id: 'fa fa-file-text-o',
        text: '<span><i class="fa fa-file-text-o"></i> fa fa-file-text-o</span> ',
        html: '<span><i class="fa fa-file-text-o"></i> fa fa-file-text-o</span> ',
        title: 'fa fa-file-text-o'
      },
      {
        id: 'fa fa-file-video-o',
        text: '<span><i class="fa fa-file-video-o"></i> fa fa-file-video-o</span> ',
        html: '<span><i class="fa fa-file-video-o"></i> fa fa-file-video-o</span> ',
        title: 'fa fa-file-video-o'
      },
      {
        id: 'fa fa-file-word-o',
        text: '<span><i class="fa fa-file-word-o"></i> fa fa-file-word-o</span> ',
        html: '<span><i class="fa fa-file-word-o"></i> fa fa-file-word-o</span> ',
        title: 'fa fa-file-word-o'
      },
      {
        id: 'fa fa-file-zip-o',
        text: '<span><i class="fa fa-file-zip-o"></i> fa fa-file-zip-o</span> ',
        html: '<span><i class="fa fa-file-zip-o"></i> fa fa-file-zip-o</span> ',
        title: 'fa fa-file-zip-o'
      },
      {
        id: 'fa fa-files-o',
        text: '<span><i class="fa fa-files-o"></i> fa fa-files-o</span> ',
        html: '<span><i class="fa fa-files-o"></i> fa fa-files-o</span> ',
        title: 'fa fa-files-o'
      },
      {
        id: 'fa fa-film',
        text: '<span><i class="fa fa-film"></i> fa fa-film</span> ',
        html: '<span><i class="fa fa-film"></i> fa fa-film</span> ',
        title: 'fa fa-film'
      },
      {
        id: 'fa fa-filter',
        text: '<span><i class="fa fa-filter"></i> fa fa-filter</span> ',
        html: '<span><i class="fa fa-filter"></i> fa fa-filter</span> ',
        title: 'fa fa-filter'
      },
      {
        id: 'fa fa-fire',
        text: '<span><i class="fa fa-fire"></i> fa fa-fire</span> ',
        html: '<span><i class="fa fa-fire"></i> fa fa-fire</span> ',
        title: 'fa fa-fire'
      },
      {
        id: 'fa fa-fire-extinguisher',
        text: '<span><i class="fa fa-fire-extinguisher"></i> fa fa-fire-extinguisher</span> ',
        html: '<span><i class="fa fa-fire-extinguisher"></i> fa fa-fire-extinguisher</span> ',
        title: 'fa fa-fire-extinguisher'
      },
      {
        id: 'fa fa-firefox',
        text: '<span><i class="fa fa-firefox"></i> fa fa-firefox</span> ',
        html: '<span><i class="fa fa-firefox"></i> fa fa-firefox</span> ',
        title: 'fa fa-firefox'
      },
      {
        id: 'fa fa-first-order',
        text: '<span><i class="fa fa-first-order"></i> fa fa-first-order</span> ',
        html: '<span><i class="fa fa-first-order"></i> fa fa-first-order</span> ',
        title: 'fa fa-first-order'
      },
      {
        id: 'fa fa-flag',
        text: '<span><i class="fa fa-flag"></i> fa fa-flag</span> ',
        html: '<span><i class="fa fa-flag"></i> fa fa-flag</span> ',
        title: 'fa fa-flag'
      },
      {
        id: 'fa fa-flag-checkered',
        text: '<span><i class="fa fa-flag-checkered"></i> fa fa-flag-checkered</span> ',
        html: '<span><i class="fa fa-flag-checkered"></i> fa fa-flag-checkered</span> ',
        title: 'fa fa-flag-checkered'
      },
      {
        id: 'fa fa-flag-o',
        text: '<span><i class="fa fa-flag-o"></i> fa fa-flag-o</span> ',
        html: '<span><i class="fa fa-flag-o"></i> fa fa-flag-o</span> ',
        title: 'fa fa-flag-o'
      },
      {
        id: 'fa fa-flash',
        text: '<span><i class="fa fa-flash"></i> fa fa-flash</span> ',
        html: '<span><i class="fa fa-flash"></i> fa fa-flash</span> ',
        title: 'fa fa-flash'
      },
      {
        id: 'fa fa-flask',
        text: '<span><i class="fa fa-flask"></i> fa fa-flask</span> ',
        html: '<span><i class="fa fa-flask"></i> fa fa-flask</span> ',
        title: 'fa fa-flask'
      },
      {
        id: 'fa fa-flickr',
        text: '<span><i class="fa fa-flickr"></i> fa fa-flickr</span> ',
        html: '<span><i class="fa fa-flickr"></i> fa fa-flickr</span> ',
        title: 'fa fa-flickr'
      },
      {
        id: 'fa fa-floppy-o',
        text: '<span><i class="fa fa-floppy-o"></i> fa fa-floppy-o</span> ',
        html: '<span><i class="fa fa-floppy-o"></i> fa fa-floppy-o</span> ',
        title: 'fa fa-floppy-o'
      },
      {
        id: 'fa fa-folder',
        text: '<span><i class="fa fa-folder"></i> fa fa-folder</span> ',
        html: '<span><i class="fa fa-folder"></i> fa fa-folder</span> ',
        title: 'fa fa-folder'
      },
      {
        id: 'fa fa-folder-o',
        text: '<span><i class="fa fa-folder-o"></i> fa fa-folder-o</span> ',
        html: '<span><i class="fa fa-folder-o"></i> fa fa-folder-o</span> ',
        title: 'fa fa-folder-o'
      },
      {
        id: 'fa fa-folder-open',
        text: '<span><i class="fa fa-folder-open"></i> fa fa-folder-open</span> ',
        html: '<span><i class="fa fa-folder-open"></i> fa fa-folder-open</span> ',
        title: 'fa fa-folder-open'
      },
      {
        id: 'fa fa-folder-open-o',
        text: '<span><i class="fa fa-folder-open-o"></i> fa fa-folder-open-o</span> ',
        html: '<span><i class="fa fa-folder-open-o"></i> fa fa-folder-open-o</span> ',
        title: 'fa fa-folder-open-o'
      },
      {
        id: 'fa fa-font',
        text: '<span><i class="fa fa-font"></i> fa fa-font</span> ',
        html: '<span><i class="fa fa-font"></i> fa fa-font</span> ',
        title: 'fa fa-font'
      },
      {
        id: 'fa fa-font-awesome',
        text: '<span><i class="fa fa-font-awesome"></i> fa fa-font-awesome</span> ',
        html: '<span><i class="fa fa-font-awesome"></i> fa fa-font-awesome</span> ',
        title: 'fa fa-font-awesome'
      },
      {
        id: 'fa fa-fonticons',
        text: '<span><i class="fa fa-fonticons"></i> fa fa-fonticons</span> ',
        html: '<span><i class="fa fa-fonticons"></i> fa fa-fonticons</span> ',
        title: 'fa fa-fonticons'
      },
      {
        id: 'fa fa-fort-awesome',
        text: '<span><i class="fa fa-fort-awesome"></i> fa fa-fort-awesome</span> ',
        html: '<span><i class="fa fa-fort-awesome"></i> fa fa-fort-awesome</span> ',
        title: 'fa fa-fort-awesome'
      },
      {
        id: 'fa fa-forumbee',
        text: '<span><i class="fa fa-forumbee"></i> fa fa-forumbee</span> ',
        html: '<span><i class="fa fa-forumbee"></i> fa fa-forumbee</span> ',
        title: 'fa fa-forumbee'
      },
      {
        id: 'fa fa-forward',
        text: '<span><i class="fa fa-forward"></i> fa fa-forward</span> ',
        html: '<span><i class="fa fa-forward"></i> fa fa-forward</span> ',
        title: 'fa fa-forward'
      },
      {
        id: 'fa fa-foursquare',
        text: '<span><i class="fa fa-foursquare"></i> fa fa-foursquare</span> ',
        html: '<span><i class="fa fa-foursquare"></i> fa fa-foursquare</span> ',
        title: 'fa fa-foursquare'
      },
      {
        id: 'fa fa-free-code-camp',
        text: '<span><i class="fa fa-free-code-camp"></i> fa fa-free-code-camp</span> ',
        html: '<span><i class="fa fa-free-code-camp"></i> fa fa-free-code-camp</span> ',
        title: 'fa fa-free-code-camp'
      },
      {
        id: 'fa fa-frown-o',
        text: '<span><i class="fa fa-frown-o"></i> fa fa-frown-o</span> ',
        html: '<span><i class="fa fa-frown-o"></i> fa fa-frown-o</span> ',
        title: 'fa fa-frown-o'
      },
      {
        id: 'fa fa-futbol-o',
        text: '<span><i class="fa fa-futbol-o"></i> fa fa-futbol-o</span> ',
        html: '<span><i class="fa fa-futbol-o"></i> fa fa-futbol-o</span> ',
        title: 'fa fa-futbol-o'
      },
      {
        id: 'fa fa-gamepad',
        text: '<span><i class="fa fa-gamepad"></i> fa fa-gamepad</span> ',
        html: '<span><i class="fa fa-gamepad"></i> fa fa-gamepad</span> ',
        title: 'fa fa-gamepad'
      },
      {
        id: 'fa fa-gavel',
        text: '<span><i class="fa fa-gavel"></i> fa fa-gavel</span> ',
        html: '<span><i class="fa fa-gavel"></i> fa fa-gavel</span> ',
        title: 'fa fa-gavel'
      },
      {
        id: 'fa fa-gbp',
        text: '<span><i class="fa fa-gbp"></i> fa fa-gbp</span> ',
        html: '<span><i class="fa fa-gbp"></i> fa fa-gbp</span> ',
        title: 'fa fa-gbp'
      },
      {
        id: 'fa fa-ge',
        text: '<span><i class="fa fa-ge"></i> fa fa-ge</span> ',
        html: '<span><i class="fa fa-ge"></i> fa fa-ge</span> ',
        title: 'fa fa-ge'
      },
      {
        id: 'fa fa-gear',
        text: '<span><i class="fa fa-gear"></i> fa fa-gear</span> ',
        html: '<span><i class="fa fa-gear"></i> fa fa-gear</span> ',
        title: 'fa fa-gear'
      },
      {
        id: 'fa fa-gears',
        text: '<span><i class="fa fa-gears"></i> fa fa-gears</span> ',
        html: '<span><i class="fa fa-gears"></i> fa fa-gears</span> ',
        title: 'fa fa-gears'
      },
      {
        id: 'fa fa-genderless',
        text: '<span><i class="fa fa-genderless"></i> fa fa-genderless</span> ',
        html: '<span><i class="fa fa-genderless"></i> fa fa-genderless</span> ',
        title: 'fa fa-genderless'
      },
      {
        id: 'fa fa-get-pocket',
        text: '<span><i class="fa fa-get-pocket"></i> fa fa-get-pocket</span> ',
        html: '<span><i class="fa fa-get-pocket"></i> fa fa-get-pocket</span> ',
        title: 'fa fa-get-pocket'
      },
      {
        id: 'fa fa-gg',
        text: '<span><i class="fa fa-gg"></i> fa fa-gg</span> ',
        html: '<span><i class="fa fa-gg"></i> fa fa-gg</span> ',
        title: 'fa fa-gg'
      },
      {
        id: 'fa fa-gg-circle',
        text: '<span><i class="fa fa-gg-circle"></i> fa fa-gg-circle</span> ',
        html: '<span><i class="fa fa-gg-circle"></i> fa fa-gg-circle</span> ',
        title: 'fa fa-gg-circle'
      },
      {
        id: 'fa fa-gift',
        text: '<span><i class="fa fa-gift"></i> fa fa-gift</span> ',
        html: '<span><i class="fa fa-gift"></i> fa fa-gift</span> ',
        title: 'fa fa-gift'
      },
      {
        id: 'fa fa-git',
        text: '<span><i class="fa fa-git"></i> fa fa-git</span> ',
        html: '<span><i class="fa fa-git"></i> fa fa-git</span> ',
        title: 'fa fa-git'
      },
      {
        id: 'fa fa-git-square',
        text: '<span><i class="fa fa-git-square"></i> fa fa-git-square</span> ',
        html: '<span><i class="fa fa-git-square"></i> fa fa-git-square</span> ',
        title: 'fa fa-git-square'
      },
      {
        id: 'fa fa-github',
        text: '<span><i class="fa fa-github"></i> fa fa-github</span> ',
        html: '<span><i class="fa fa-github"></i> fa fa-github</span> ',
        title: 'fa fa-github'
      },
      {
        id: 'fa fa-github-alt',
        text: '<span><i class="fa fa-github-alt"></i> fa fa-github-alt</span> ',
        html: '<span><i class="fa fa-github-alt"></i> fa fa-github-alt</span> ',
        title: 'fa fa-github-alt'
      },
      {
        id: 'fa fa-github-square',
        text: '<span><i class="fa fa-github-square"></i> fa fa-github-square</span> ',
        html: '<span><i class="fa fa-github-square"></i> fa fa-github-square</span> ',
        title: 'fa fa-github-square'
      },
      {
        id: 'fa fa-gitlab',
        text: '<span><i class="fa fa-gitlab"></i> fa fa-gitlab</span> ',
        html: '<span><i class="fa fa-gitlab"></i> fa fa-gitlab</span> ',
        title: 'fa fa-gitlab'
      },
      {
        id: 'fa fa-gittip',
        text: '<span><i class="fa fa-gittip"></i> fa fa-gittip</span> ',
        html: '<span><i class="fa fa-gittip"></i> fa fa-gittip</span> ',
        title: 'fa fa-gittip'
      },
      {
        id: 'fa fa-glass',
        text: '<span><i class="fa fa-glass"></i> fa fa-glass</span> ',
        html: '<span><i class="fa fa-glass"></i> fa fa-glass</span> ',
        title: 'fa fa-glass'
      },
      {
        id: 'fa fa-glide',
        text: '<span><i class="fa fa-glide"></i> fa fa-glide</span> ',
        html: '<span><i class="fa fa-glide"></i> fa fa-glide</span> ',
        title: 'fa fa-glide'
      },
      {
        id: 'fa fa-glide-g',
        text: '<span><i class="fa fa-glide-g"></i> fa fa-glide-g</span> ',
        html: '<span><i class="fa fa-glide-g"></i> fa fa-glide-g</span> ',
        title: 'fa fa-glide-g'
      },
      {
        id: 'fa fa-globe',
        text: '<span><i class="fa fa-globe"></i> fa fa-globe</span> ',
        html: '<span><i class="fa fa-globe"></i> fa fa-globe</span> ',
        title: 'fa fa-globe'
      },
      {
        id: 'fa fa-google',
        text: '<span><i class="fa fa-google"></i> fa fa-google</span> ',
        html: '<span><i class="fa fa-google"></i> fa fa-google</span> ',
        title: 'fa fa-google'
      },
      {
        id: 'fa fa-google-plus',
        text: '<span><i class="fa fa-google-plus"></i> fa fa-google-plus</span> ',
        html: '<span><i class="fa fa-google-plus"></i> fa fa-google-plus</span> ',
        title: 'fa fa-google-plus'
      },
      {
        id: 'fa fa-google-plus-circle',
        text: '<span><i class="fa fa-google-plus-circle"></i> fa fa-google-plus-circle</span> ',
        html: '<span><i class="fa fa-google-plus-circle"></i> fa fa-google-plus-circle</span> ',
        title: 'fa fa-google-plus-circle'
      },
      {
        id: 'fa fa-google-plus-official',
        text: '<span><i class="fa fa-google-plus-official"></i> fa fa-google-plus-official</span> ',
        html: '<span><i class="fa fa-google-plus-official"></i> fa fa-google-plus-official</span> ',
        title: 'fa fa-google-plus-official'
      },
      {
        id: 'fa fa-google-plus-square',
        text: '<span><i class="fa fa-google-plus-square"></i> fa fa-google-plus-square</span> ',
        html: '<span><i class="fa fa-google-plus-square"></i> fa fa-google-plus-square</span> ',
        title: 'fa fa-google-plus-square'
      },
      {
        id: 'fa fa-google-wallet',
        text: '<span><i class="fa fa-google-wallet"></i> fa fa-google-wallet</span> ',
        html: '<span><i class="fa fa-google-wallet"></i> fa fa-google-wallet</span> ',
        title: 'fa fa-google-wallet'
      },
      {
        id: 'fa fa-graduation-cap',
        text: '<span><i class="fa fa-graduation-cap"></i> fa fa-graduation-cap</span> ',
        html: '<span><i class="fa fa-graduation-cap"></i> fa fa-graduation-cap</span> ',
        title: 'fa fa-graduation-cap'
      },
      {
        id: 'fa fa-gratipay',
        text: '<span><i class="fa fa-gratipay"></i> fa fa-gratipay</span> ',
        html: '<span><i class="fa fa-gratipay"></i> fa fa-gratipay</span> ',
        title: 'fa fa-gratipay'
      },
      {
        id: 'fa fa-grav',
        text: '<span><i class="fa fa-grav"></i> fa fa-grav</span> ',
        html: '<span><i class="fa fa-grav"></i> fa fa-grav</span> ',
        title: 'fa fa-grav'
      },
      {
        id: 'fa fa-group',
        text: '<span><i class="fa fa-group"></i> fa fa-group</span> ',
        html: '<span><i class="fa fa-group"></i> fa fa-group</span> ',
        title: 'fa fa-group'
      },
      {
        id: 'fa fa-h-square',
        text: '<span><i class="fa fa-h-square"></i> fa fa-h-square</span> ',
        html: '<span><i class="fa fa-h-square"></i> fa fa-h-square</span> ',
        title: 'fa fa-h-square'
      },
      {
        id: 'fa fa-hacker-news',
        text: '<span><i class="fa fa-hacker-news"></i> fa fa-hacker-news</span> ',
        html: '<span><i class="fa fa-hacker-news"></i> fa fa-hacker-news</span> ',
        title: 'fa fa-hacker-news'
      },
      {
        id: 'fa fa-hand-grab-o',
        text: '<span><i class="fa fa-hand-grab-o"></i> fa fa-hand-grab-o</span> ',
        html: '<span><i class="fa fa-hand-grab-o"></i> fa fa-hand-grab-o</span> ',
        title: 'fa fa-hand-grab-o'
      },
      {
        id: 'fa fa-hand-lizard-o',
        text: '<span><i class="fa fa-hand-lizard-o"></i> fa fa-hand-lizard-o</span> ',
        html: '<span><i class="fa fa-hand-lizard-o"></i> fa fa-hand-lizard-o</span> ',
        title: 'fa fa-hand-lizard-o'
      },
      {
        id: 'fa fa-hand-o-down',
        text: '<span><i class="fa fa-hand-o-down"></i> fa fa-hand-o-down</span> ',
        html: '<span><i class="fa fa-hand-o-down"></i> fa fa-hand-o-down</span> ',
        title: 'fa fa-hand-o-down'
      },
      {
        id: 'fa fa-hand-o-left',
        text: '<span><i class="fa fa-hand-o-left"></i> fa fa-hand-o-left</span> ',
        html: '<span><i class="fa fa-hand-o-left"></i> fa fa-hand-o-left</span> ',
        title: 'fa fa-hand-o-left'
      },
      {
        id: 'fa fa-hand-o-right',
        text: '<span><i class="fa fa-hand-o-right"></i> fa fa-hand-o-right</span> ',
        html: '<span><i class="fa fa-hand-o-right"></i> fa fa-hand-o-right</span> ',
        title: 'fa fa-hand-o-right'
      },
      {
        id: 'fa fa-hand-o-up',
        text: '<span><i class="fa fa-hand-o-up"></i> fa fa-hand-o-up</span> ',
        html: '<span><i class="fa fa-hand-o-up"></i> fa fa-hand-o-up</span> ',
        title: 'fa fa-hand-o-up'
      },
      {
        id: 'fa fa-hand-paper-o',
        text: '<span><i class="fa fa-hand-paper-o"></i> fa fa-hand-paper-o</span> ',
        html: '<span><i class="fa fa-hand-paper-o"></i> fa fa-hand-paper-o</span> ',
        title: 'fa fa-hand-paper-o'
      },
      {
        id: 'fa fa-hand-peace-o',
        text: '<span><i class="fa fa-hand-peace-o"></i> fa fa-hand-peace-o</span> ',
        html: '<span><i class="fa fa-hand-peace-o"></i> fa fa-hand-peace-o</span> ',
        title: 'fa fa-hand-peace-o'
      },
      {
        id: 'fa fa-hand-pointer-o',
        text: '<span><i class="fa fa-hand-pointer-o"></i> fa fa-hand-pointer-o</span> ',
        html: '<span><i class="fa fa-hand-pointer-o"></i> fa fa-hand-pointer-o</span> ',
        title: 'fa fa-hand-pointer-o'
      },
      {
        id: 'fa fa-hand-rock-o',
        text: '<span><i class="fa fa-hand-rock-o"></i> fa fa-hand-rock-o</span> ',
        html: '<span><i class="fa fa-hand-rock-o"></i> fa fa-hand-rock-o</span> ',
        title: 'fa fa-hand-rock-o'
      },
      {
        id: 'fa fa-hand-scissors-o',
        text: '<span><i class="fa fa-hand-scissors-o"></i> fa fa-hand-scissors-o</span> ',
        html: '<span><i class="fa fa-hand-scissors-o"></i> fa fa-hand-scissors-o</span> ',
        title: 'fa fa-hand-scissors-o'
      },
      {
        id: 'fa fa-hand-spock-o',
        text: '<span><i class="fa fa-hand-spock-o"></i> fa fa-hand-spock-o</span> ',
        html: '<span><i class="fa fa-hand-spock-o"></i> fa fa-hand-spock-o</span> ',
        title: 'fa fa-hand-spock-o'
      },
      {
        id: 'fa fa-hand-stop-o',
        text: '<span><i class="fa fa-hand-stop-o"></i> fa fa-hand-stop-o</span> ',
        html: '<span><i class="fa fa-hand-stop-o"></i> fa fa-hand-stop-o</span> ',
        title: 'fa fa-hand-stop-o'
      },
      {
        id: 'fa fa-handshake-o',
        text: '<span><i class="fa fa-handshake-o"></i> fa fa-handshake-o</span> ',
        html: '<span><i class="fa fa-handshake-o"></i> fa fa-handshake-o</span> ',
        title: 'fa fa-handshake-o'
      },
      {
        id: 'fa fa-hard-of-hearing',
        text: '<span><i class="fa fa-hard-of-hearing"></i> fa fa-hard-of-hearing</span> ',
        html: '<span><i class="fa fa-hard-of-hearing"></i> fa fa-hard-of-hearing</span> ',
        title: 'fa fa-hard-of-hearing'
      },
      {
        id: 'fa fa-hashtag',
        text: '<span><i class="fa fa-hashtag"></i> fa fa-hashtag</span> ',
        html: '<span><i class="fa fa-hashtag"></i> fa fa-hashtag</span> ',
        title: 'fa fa-hashtag'
      },
      {
        id: 'fa fa-hdd-o',
        text: '<span><i class="fa fa-hdd-o"></i> fa fa-hdd-o</span> ',
        html: '<span><i class="fa fa-hdd-o"></i> fa fa-hdd-o</span> ',
        title: 'fa fa-hdd-o'
      },
      {
        id: 'fa fa-header',
        text: '<span><i class="fa fa-header"></i> fa fa-header</span> ',
        html: '<span><i class="fa fa-header"></i> fa fa-header</span> ',
        title: 'fa fa-header'
      },
      {
        id: 'fa fa-headphones',
        text: '<span><i class="fa fa-headphones"></i> fa fa-headphones</span> ',
        html: '<span><i class="fa fa-headphones"></i> fa fa-headphones</span> ',
        title: 'fa fa-headphones'
      },
      {
        id: 'fa fa-heart',
        text: '<span><i class="fa fa-heart"></i> fa fa-heart</span> ',
        html: '<span><i class="fa fa-heart"></i> fa fa-heart</span> ',
        title: 'fa fa-heart'
      },
      {
        id: 'fa fa-heart-o',
        text: '<span><i class="fa fa-heart-o"></i> fa fa-heart-o</span> ',
        html: '<span><i class="fa fa-heart-o"></i> fa fa-heart-o</span> ',
        title: 'fa fa-heart-o'
      },
      {
        id: 'fa fa-heartbeat',
        text: '<span><i class="fa fa-heartbeat"></i> fa fa-heartbeat</span> ',
        html: '<span><i class="fa fa-heartbeat"></i> fa fa-heartbeat</span> ',
        title: 'fa fa-heartbeat'
      },
      {
        id: 'fa fa-history',
        text: '<span><i class="fa fa-history"></i> fa fa-history</span> ',
        html: '<span><i class="fa fa-history"></i> fa fa-history</span> ',
        title: 'fa fa-history'
      },
      {
        id: 'fa fa-home',
        text: '<span><i class="fa fa-home"></i> fa fa-home</span> ',
        html: '<span><i class="fa fa-home"></i> fa fa-home</span> ',
        title: 'fa fa-home'
      },
      {
        id: 'fa fa-hospital-o',
        text: '<span><i class="fa fa-hospital-o"></i> fa fa-hospital-o</span> ',
        html: '<span><i class="fa fa-hospital-o"></i> fa fa-hospital-o</span> ',
        title: 'fa fa-hospital-o'
      },
      {
        id: 'fa fa-hotel',
        text: '<span><i class="fa fa-hotel"></i> fa fa-hotel</span> ',
        html: '<span><i class="fa fa-hotel"></i> fa fa-hotel</span> ',
        title: 'fa fa-hotel'
      },
      {
        id: 'fa fa-hourglass',
        text: '<span><i class="fa fa-hourglass"></i> fa fa-hourglass</span> ',
        html: '<span><i class="fa fa-hourglass"></i> fa fa-hourglass</span> ',
        title: 'fa fa-hourglass'
      },
      {
        id: 'fa fa-hourglass-1',
        text: '<span><i class="fa fa-hourglass-1"></i> fa fa-hourglass-1</span> ',
        html: '<span><i class="fa fa-hourglass-1"></i> fa fa-hourglass-1</span> ',
        title: 'fa fa-hourglass-1'
      },
      {
        id: 'fa fa-hourglass-2',
        text: '<span><i class="fa fa-hourglass-2"></i> fa fa-hourglass-2</span> ',
        html: '<span><i class="fa fa-hourglass-2"></i> fa fa-hourglass-2</span> ',
        title: 'fa fa-hourglass-2'
      },
      {
        id: 'fa fa-hourglass-3',
        text: '<span><i class="fa fa-hourglass-3"></i> fa fa-hourglass-3</span> ',
        html: '<span><i class="fa fa-hourglass-3"></i> fa fa-hourglass-3</span> ',
        title: 'fa fa-hourglass-3'
      },
      {
        id: 'fa fa-hourglass-end',
        text: '<span><i class="fa fa-hourglass-end"></i> fa fa-hourglass-end</span> ',
        html: '<span><i class="fa fa-hourglass-end"></i> fa fa-hourglass-end</span> ',
        title: 'fa fa-hourglass-end'
      },
      {
        id: 'fa fa-hourglass-half',
        text: '<span><i class="fa fa-hourglass-half"></i> fa fa-hourglass-half</span> ',
        html: '<span><i class="fa fa-hourglass-half"></i> fa fa-hourglass-half</span> ',
        title: 'fa fa-hourglass-half'
      },
      {
        id: 'fa fa-hourglass-o',
        text: '<span><i class="fa fa-hourglass-o"></i> fa fa-hourglass-o</span> ',
        html: '<span><i class="fa fa-hourglass-o"></i> fa fa-hourglass-o</span> ',
        title: 'fa fa-hourglass-o'
      },
      {
        id: 'fa fa-hourglass-start',
        text: '<span><i class="fa fa-hourglass-start"></i> fa fa-hourglass-start</span> ',
        html: '<span><i class="fa fa-hourglass-start"></i> fa fa-hourglass-start</span> ',
        title: 'fa fa-hourglass-start'
      },
      {
        id: 'fa fa-houzz',
        text: '<span><i class="fa fa-houzz"></i> fa fa-houzz</span> ',
        html: '<span><i class="fa fa-houzz"></i> fa fa-houzz</span> ',
        title: 'fa fa-houzz'
      },
      {
        id: 'fa fa-html5',
        text: '<span><i class="fa fa-html5"></i> fa fa-html5</span> ',
        html: '<span><i class="fa fa-html5"></i> fa fa-html5</span> ',
        title: 'fa fa-html5'
      },
      {
        id: 'fa fa-i-cursor',
        text: '<span><i class="fa fa-i-cursor"></i> fa fa-i-cursor</span> ',
        html: '<span><i class="fa fa-i-cursor"></i> fa fa-i-cursor</span> ',
        title: 'fa fa-i-cursor'
      },
      {
        id: 'fa fa-id-badge',
        text: '<span><i class="fa fa-id-badge"></i> fa fa-id-badge</span> ',
        html: '<span><i class="fa fa-id-badge"></i> fa fa-id-badge</span> ',
        title: 'fa fa-id-badge'
      },
      {
        id: 'fa fa-id-card',
        text: '<span><i class="fa fa-id-card"></i> fa fa-id-card</span> ',
        html: '<span><i class="fa fa-id-card"></i> fa fa-id-card</span> ',
        title: 'fa fa-id-card'
      },
      {
        id: 'fa fa-id-card-o',
        text: '<span><i class="fa fa-id-card-o"></i> fa fa-id-card-o</span> ',
        html: '<span><i class="fa fa-id-card-o"></i> fa fa-id-card-o</span> ',
        title: 'fa fa-id-card-o'
      },
      {
        id: 'fa fa-ils',
        text: '<span><i class="fa fa-ils"></i> fa fa-ils</span> ',
        html: '<span><i class="fa fa-ils"></i> fa fa-ils</span> ',
        title: 'fa fa-ils'
      },
      {
        id: 'fa fa-image',
        text: '<span><i class="fa fa-image"></i> fa fa-image</span> ',
        html: '<span><i class="fa fa-image"></i> fa fa-image</span> ',
        title: 'fa fa-image'
      },
      {
        id: 'fa fa-imdb',
        text: '<span><i class="fa fa-imdb"></i> fa fa-imdb</span> ',
        html: '<span><i class="fa fa-imdb"></i> fa fa-imdb</span> ',
        title: 'fa fa-imdb'
      },
      {
        id: 'fa fa-inbox',
        text: '<span><i class="fa fa-inbox"></i> fa fa-inbox</span> ',
        html: '<span><i class="fa fa-inbox"></i> fa fa-inbox</span> ',
        title: 'fa fa-inbox'
      },
      {
        id: 'fa fa-indent',
        text: '<span><i class="fa fa-indent"></i> fa fa-indent</span> ',
        html: '<span><i class="fa fa-indent"></i> fa fa-indent</span> ',
        title: 'fa fa-indent'
      },
      {
        id: 'fa fa-industry',
        text: '<span><i class="fa fa-industry"></i> fa fa-industry</span> ',
        html: '<span><i class="fa fa-industry"></i> fa fa-industry</span> ',
        title: 'fa fa-industry'
      },
      {
        id: 'fa fa-info',
        text: '<span><i class="fa fa-info"></i> fa fa-info</span> ',
        html: '<span><i class="fa fa-info"></i> fa fa-info</span> ',
        title: 'fa fa-info'
      },
      {
        id: 'fa fa-info-circle',
        text: '<span><i class="fa fa-info-circle"></i> fa fa-info-circle</span> ',
        html: '<span><i class="fa fa-info-circle"></i> fa fa-info-circle</span> ',
        title: 'fa fa-info-circle'
      },
      {
        id: 'fa fa-inr',
        text: '<span><i class="fa fa-inr"></i> fa fa-inr</span> ',
        html: '<span><i class="fa fa-inr"></i> fa fa-inr</span> ',
        title: 'fa fa-inr'
      },
      {
        id: 'fa fa-instagram',
        text: '<span><i class="fa fa-instagram"></i> fa fa-instagram</span> ',
        html: '<span><i class="fa fa-instagram"></i> fa fa-instagram</span> ',
        title: 'fa fa-instagram'
      },
      {
        id: 'fa fa-institution',
        text: '<span><i class="fa fa-institution"></i> fa fa-institution</span> ',
        html: '<span><i class="fa fa-institution"></i> fa fa-institution</span> ',
        title: 'fa fa-institution'
      },
      {
        id: 'fa fa-internet-explorer',
        text: '<span><i class="fa fa-internet-explorer"></i> fa fa-internet-explorer</span> ',
        html: '<span><i class="fa fa-internet-explorer"></i> fa fa-internet-explorer</span> ',
        title: 'fa fa-internet-explorer'
      },
      {
        id: 'fa fa-intersex',
        text: '<span><i class="fa fa-intersex"></i> fa fa-intersex</span> ',
        html: '<span><i class="fa fa-intersex"></i> fa fa-intersex</span> ',
        title: 'fa fa-intersex'
      },
      {
        id: 'fa fa-ioxhost',
        text: '<span><i class="fa fa-ioxhost"></i> fa fa-ioxhost</span> ',
        html: '<span><i class="fa fa-ioxhost"></i> fa fa-ioxhost</span> ',
        title: 'fa fa-ioxhost'
      },
      {
        id: 'fa fa-italic',
        text: '<span><i class="fa fa-italic"></i> fa fa-italic</span> ',
        html: '<span><i class="fa fa-italic"></i> fa fa-italic</span> ',
        title: 'fa fa-italic'
      },
      {
        id: 'fa fa-joomla',
        text: '<span><i class="fa fa-joomla"></i> fa fa-joomla</span> ',
        html: '<span><i class="fa fa-joomla"></i> fa fa-joomla</span> ',
        title: 'fa fa-joomla'
      },
      {
        id: 'fa fa-jpy',
        text: '<span><i class="fa fa-jpy"></i> fa fa-jpy</span> ',
        html: '<span><i class="fa fa-jpy"></i> fa fa-jpy</span> ',
        title: 'fa fa-jpy'
      },
      {
        id: 'fa fa-jsfiddle',
        text: '<span><i class="fa fa-jsfiddle"></i> fa fa-jsfiddle</span> ',
        html: '<span><i class="fa fa-jsfiddle"></i> fa fa-jsfiddle</span> ',
        title: 'fa fa-jsfiddle'
      },
      {
        id: 'fa fa-key',
        text: '<span><i class="fa fa-key"></i> fa fa-key</span> ',
        html: '<span><i class="fa fa-key"></i> fa fa-key</span> ',
        title: 'fa fa-key'
      },
      {
        id: 'fa fa-keyboard-o',
        text: '<span><i class="fa fa-keyboard-o"></i> fa fa-keyboard-o</span> ',
        html: '<span><i class="fa fa-keyboard-o"></i> fa fa-keyboard-o</span> ',
        title: 'fa fa-keyboard-o'
      },
      {
        id: 'fa fa-krw',
        text: '<span><i class="fa fa-krw"></i> fa fa-krw</span> ',
        html: '<span><i class="fa fa-krw"></i> fa fa-krw</span> ',
        title: 'fa fa-krw'
      },
      {
        id: 'fa fa-language',
        text: '<span><i class="fa fa-language"></i> fa fa-language</span> ',
        html: '<span><i class="fa fa-language"></i> fa fa-language</span> ',
        title: 'fa fa-language'
      },
      {
        id: 'fa fa-laptop',
        text: '<span><i class="fa fa-laptop"></i> fa fa-laptop</span> ',
        html: '<span><i class="fa fa-laptop"></i> fa fa-laptop</span> ',
        title: 'fa fa-laptop'
      },
      {
        id: 'fa fa-lastfm',
        text: '<span><i class="fa fa-lastfm"></i> fa fa-lastfm</span> ',
        html: '<span><i class="fa fa-lastfm"></i> fa fa-lastfm</span> ',
        title: 'fa fa-lastfm'
      },
      {
        id: 'fa fa-lastfm-square',
        text: '<span><i class="fa fa-lastfm-square"></i> fa fa-lastfm-square</span> ',
        html: '<span><i class="fa fa-lastfm-square"></i> fa fa-lastfm-square</span> ',
        title: 'fa fa-lastfm-square'
      },
      {
        id: 'fa fa-leaf',
        text: '<span><i class="fa fa-leaf"></i> fa fa-leaf</span> ',
        html: '<span><i class="fa fa-leaf"></i> fa fa-leaf</span> ',
        title: 'fa fa-leaf'
      },
      {
        id: 'fa fa-leanpub',
        text: '<span><i class="fa fa-leanpub"></i> fa fa-leanpub</span> ',
        html: '<span><i class="fa fa-leanpub"></i> fa fa-leanpub</span> ',
        title: 'fa fa-leanpub'
      },
      {
        id: 'fa fa-legal',
        text: '<span><i class="fa fa-legal"></i> fa fa-legal</span> ',
        html: '<span><i class="fa fa-legal"></i> fa fa-legal</span> ',
        title: 'fa fa-legal'
      },
      {
        id: 'fa fa-lemon-o',
        text: '<span><i class="fa fa-lemon-o"></i> fa fa-lemon-o</span> ',
        html: '<span><i class="fa fa-lemon-o"></i> fa fa-lemon-o</span> ',
        title: 'fa fa-lemon-o'
      },
      {
        id: 'fa fa-level-down',
        text: '<span><i class="fa fa-level-down"></i> fa fa-level-down</span> ',
        html: '<span><i class="fa fa-level-down"></i> fa fa-level-down</span> ',
        title: 'fa fa-level-down'
      },
      {
        id: 'fa fa-level-up',
        text: '<span><i class="fa fa-level-up"></i> fa fa-level-up</span> ',
        html: '<span><i class="fa fa-level-up"></i> fa fa-level-up</span> ',
        title: 'fa fa-level-up'
      },
      {
        id: 'fa fa-life-bouy',
        text: '<span><i class="fa fa-life-bouy"></i> fa fa-life-bouy</span> ',
        html: '<span><i class="fa fa-life-bouy"></i> fa fa-life-bouy</span> ',
        title: 'fa fa-life-bouy'
      },
      {
        id: 'fa fa-life-buoy',
        text: '<span><i class="fa fa-life-buoy"></i> fa fa-life-buoy</span> ',
        html: '<span><i class="fa fa-life-buoy"></i> fa fa-life-buoy</span> ',
        title: 'fa fa-life-buoy'
      },
      {
        id: 'fa fa-life-ring',
        text: '<span><i class="fa fa-life-ring"></i> fa fa-life-ring</span> ',
        html: '<span><i class="fa fa-life-ring"></i> fa fa-life-ring</span> ',
        title: 'fa fa-life-ring'
      },
      {
        id: 'fa fa-life-saver',
        text: '<span><i class="fa fa-life-saver"></i> fa fa-life-saver</span> ',
        html: '<span><i class="fa fa-life-saver"></i> fa fa-life-saver</span> ',
        title: 'fa fa-life-saver'
      },
      {
        id: 'fa fa-lightbulb-o',
        text: '<span><i class="fa fa-lightbulb-o"></i> fa fa-lightbulb-o</span> ',
        html: '<span><i class="fa fa-lightbulb-o"></i> fa fa-lightbulb-o</span> ',
        title: 'fa fa-lightbulb-o'
      },
      {
        id: 'fa fa-line-chart',
        text: '<span><i class="fa fa-line-chart"></i> fa fa-line-chart</span> ',
        html: '<span><i class="fa fa-line-chart"></i> fa fa-line-chart</span> ',
        title: 'fa fa-line-chart'
      },
      {
        id: 'fa fa-link',
        text: '<span><i class="fa fa-link"></i> fa fa-link</span> ',
        html: '<span><i class="fa fa-link"></i> fa fa-link</span> ',
        title: 'fa fa-link'
      },
      {
        id: 'fa fa-linkedin',
        text: '<span><i class="fa fa-linkedin"></i> fa fa-linkedin</span> ',
        html: '<span><i class="fa fa-linkedin"></i> fa fa-linkedin</span> ',
        title: 'fa fa-linkedin'
      },
      {
        id: 'fa fa-linkedin-square',
        text: '<span><i class="fa fa-linkedin-square"></i> fa fa-linkedin-square</span> ',
        html: '<span><i class="fa fa-linkedin-square"></i> fa fa-linkedin-square</span> ',
        title: 'fa fa-linkedin-square'
      },
      {
        id: 'fa fa-linode',
        text: '<span><i class="fa fa-linode"></i> fa fa-linode</span> ',
        html: '<span><i class="fa fa-linode"></i> fa fa-linode</span> ',
        title: 'fa fa-linode'
      },
      {
        id: 'fa fa-linux',
        text: '<span><i class="fa fa-linux"></i> fa fa-linux</span> ',
        html: '<span><i class="fa fa-linux"></i> fa fa-linux</span> ',
        title: 'fa fa-linux'
      },
      {
        id: 'fa fa-list',
        text: '<span><i class="fa fa-list"></i> fa fa-list</span> ',
        html: '<span><i class="fa fa-list"></i> fa fa-list</span> ',
        title: 'fa fa-list'
      },
      {
        id: 'fa fa-list-alt',
        text: '<span><i class="fa fa-list-alt"></i> fa fa-list-alt</span> ',
        html: '<span><i class="fa fa-list-alt"></i> fa fa-list-alt</span> ',
        title: 'fa fa-list-alt'
      },
      {
        id: 'fa fa-list-ol',
        text: '<span><i class="fa fa-list-ol"></i> fa fa-list-ol</span> ',
        html: '<span><i class="fa fa-list-ol"></i> fa fa-list-ol</span> ',
        title: 'fa fa-list-ol'
      },
      {
        id: 'fa fa-list-ul',
        text: '<span><i class="fa fa-list-ul"></i> fa fa-list-ul</span> ',
        html: '<span><i class="fa fa-list-ul"></i> fa fa-list-ul</span> ',
        title: 'fa fa-list-ul'
      },
      {
        id: 'fa fa-location-arrow',
        text: '<span><i class="fa fa-location-arrow"></i> fa fa-location-arrow</span> ',
        html: '<span><i class="fa fa-location-arrow"></i> fa fa-location-arrow</span> ',
        title: 'fa fa-location-arrow'
      },
      {
        id: 'fa fa-lock',
        text: '<span><i class="fa fa-lock"></i> fa fa-lock</span> ',
        html: '<span><i class="fa fa-lock"></i> fa fa-lock</span> ',
        title: 'fa fa-lock'
      },
      {
        id: 'fa fa-long-arrow-down',
        text: '<span><i class="fa fa-long-arrow-down"></i> fa fa-long-arrow-down</span> ',
        html: '<span><i class="fa fa-long-arrow-down"></i> fa fa-long-arrow-down</span> ',
        title: 'fa fa-long-arrow-down'
      },
      {
        id: 'fa fa-long-arrow-left',
        text: '<span><i class="fa fa-long-arrow-left"></i> fa fa-long-arrow-left</span> ',
        html: '<span><i class="fa fa-long-arrow-left"></i> fa fa-long-arrow-left</span> ',
        title: 'fa fa-long-arrow-left'
      },
      {
        id: 'fa fa-long-arrow-right',
        text: '<span><i class="fa fa-long-arrow-right"></i> fa fa-long-arrow-right</span> ',
        html: '<span><i class="fa fa-long-arrow-right"></i> fa fa-long-arrow-right</span> ',
        title: 'fa fa-long-arrow-right'
      },
      {
        id: 'fa fa-long-arrow-up',
        text: '<span><i class="fa fa-long-arrow-up"></i> fa fa-long-arrow-up</span> ',
        html: '<span><i class="fa fa-long-arrow-up"></i> fa fa-long-arrow-up</span> ',
        title: 'fa fa-long-arrow-up'
      },
      {
        id: 'fa fa-low-vision',
        text: '<span><i class="fa fa-low-vision"></i> fa fa-low-vision</span> ',
        html: '<span><i class="fa fa-low-vision"></i> fa fa-low-vision</span> ',
        title: 'fa fa-low-vision'
      },
      {
        id: 'fa fa-magic',
        text: '<span><i class="fa fa-magic"></i> fa fa-magic</span> ',
        html: '<span><i class="fa fa-magic"></i> fa fa-magic</span> ',
        title: 'fa fa-magic'
      },
      {
        id: 'fa fa-magnet',
        text: '<span><i class="fa fa-magnet"></i> fa fa-magnet</span> ',
        html: '<span><i class="fa fa-magnet"></i> fa fa-magnet</span> ',
        title: 'fa fa-magnet'
      },
      {
        id: 'fa fa-mail-forward',
        text: '<span><i class="fa fa-mail-forward"></i> fa fa-mail-forward</span> ',
        html: '<span><i class="fa fa-mail-forward"></i> fa fa-mail-forward</span> ',
        title: 'fa fa-mail-forward'
      },
      {
        id: 'fa fa-mail-reply',
        text: '<span><i class="fa fa-mail-reply"></i> fa fa-mail-reply</span> ',
        html: '<span><i class="fa fa-mail-reply"></i> fa fa-mail-reply</span> ',
        title: 'fa fa-mail-reply'
      },
      {
        id: 'fa fa-mail-reply-all',
        text: '<span><i class="fa fa-mail-reply-all"></i> fa fa-mail-reply-all</span> ',
        html: '<span><i class="fa fa-mail-reply-all"></i> fa fa-mail-reply-all</span> ',
        title: 'fa fa-mail-reply-all'
      },
      {
        id: 'fa fa-male',
        text: '<span><i class="fa fa-male"></i> fa fa-male</span> ',
        html: '<span><i class="fa fa-male"></i> fa fa-male</span> ',
        title: 'fa fa-male'
      },
      {
        id: 'fa fa-map',
        text: '<span><i class="fa fa-map"></i> fa fa-map</span> ',
        html: '<span><i class="fa fa-map"></i> fa fa-map</span> ',
        title: 'fa fa-map'
      },
      {
        id: 'fa fa-map-marker',
        text: '<span><i class="fa fa-map-marker"></i> fa fa-map-marker</span> ',
        html: '<span><i class="fa fa-map-marker"></i> fa fa-map-marker</span> ',
        title: 'fa fa-map-marker'
      },
      {
        id: 'fa fa-map-o',
        text: '<span><i class="fa fa-map-o"></i> fa fa-map-o</span> ',
        html: '<span><i class="fa fa-map-o"></i> fa fa-map-o</span> ',
        title: 'fa fa-map-o'
      },
      {
        id: 'fa fa-map-pin',
        text: '<span><i class="fa fa-map-pin"></i> fa fa-map-pin</span> ',
        html: '<span><i class="fa fa-map-pin"></i> fa fa-map-pin</span> ',
        title: 'fa fa-map-pin'
      },
      {
        id: 'fa fa-map-signs',
        text: '<span><i class="fa fa-map-signs"></i> fa fa-map-signs</span> ',
        html: '<span><i class="fa fa-map-signs"></i> fa fa-map-signs</span> ',
        title: 'fa fa-map-signs'
      },
      {
        id: 'fa fa-mars',
        text: '<span><i class="fa fa-mars"></i> fa fa-mars</span> ',
        html: '<span><i class="fa fa-mars"></i> fa fa-mars</span> ',
        title: 'fa fa-mars'
      },
      {
        id: 'fa fa-mars-double',
        text: '<span><i class="fa fa-mars-double"></i> fa fa-mars-double</span> ',
        html: '<span><i class="fa fa-mars-double"></i> fa fa-mars-double</span> ',
        title: 'fa fa-mars-double'
      },
      {
        id: 'fa fa-mars-stroke',
        text: '<span><i class="fa fa-mars-stroke"></i> fa fa-mars-stroke</span> ',
        html: '<span><i class="fa fa-mars-stroke"></i> fa fa-mars-stroke</span> ',
        title: 'fa fa-mars-stroke'
      },
      {
        id: 'fa fa-mars-stroke-h',
        text: '<span><i class="fa fa-mars-stroke-h"></i> fa fa-mars-stroke-h</span> ',
        html: '<span><i class="fa fa-mars-stroke-h"></i> fa fa-mars-stroke-h</span> ',
        title: 'fa fa-mars-stroke-h'
      },
      {
        id: 'fa fa-mars-stroke-v',
        text: '<span><i class="fa fa-mars-stroke-v"></i> fa fa-mars-stroke-v</span> ',
        html: '<span><i class="fa fa-mars-stroke-v"></i> fa fa-mars-stroke-v</span> ',
        title: 'fa fa-mars-stroke-v'
      },
      {
        id: 'fa fa-maxcdn',
        text: '<span><i class="fa fa-maxcdn"></i> fa fa-maxcdn</span> ',
        html: '<span><i class="fa fa-maxcdn"></i> fa fa-maxcdn</span> ',
        title: 'fa fa-maxcdn'
      },
      {
        id: 'fa fa-meanpath',
        text: '<span><i class="fa fa-meanpath"></i> fa fa-meanpath</span> ',
        html: '<span><i class="fa fa-meanpath"></i> fa fa-meanpath</span> ',
        title: 'fa fa-meanpath'
      },
      {
        id: 'fa fa-medium',
        text: '<span><i class="fa fa-medium"></i> fa fa-medium</span> ',
        html: '<span><i class="fa fa-medium"></i> fa fa-medium</span> ',
        title: 'fa fa-medium'
      },
      {
        id: 'fa fa-medkit',
        text: '<span><i class="fa fa-medkit"></i> fa fa-medkit</span> ',
        html: '<span><i class="fa fa-medkit"></i> fa fa-medkit</span> ',
        title: 'fa fa-medkit'
      },
      {
        id: 'fa fa-meetup',
        text: '<span><i class="fa fa-meetup"></i> fa fa-meetup</span> ',
        html: '<span><i class="fa fa-meetup"></i> fa fa-meetup</span> ',
        title: 'fa fa-meetup'
      },
      {
        id: 'fa fa-meh-o',
        text: '<span><i class="fa fa-meh-o"></i> fa fa-meh-o</span> ',
        html: '<span><i class="fa fa-meh-o"></i> fa fa-meh-o</span> ',
        title: 'fa fa-meh-o'
      },
      {
        id: 'fa fa-mercury',
        text: '<span><i class="fa fa-mercury"></i> fa fa-mercury</span> ',
        html: '<span><i class="fa fa-mercury"></i> fa fa-mercury</span> ',
        title: 'fa fa-mercury'
      },
      {
        id: 'fa fa-microchip',
        text: '<span><i class="fa fa-microchip"></i> fa fa-microchip</span> ',
        html: '<span><i class="fa fa-microchip"></i> fa fa-microchip</span> ',
        title: 'fa fa-microchip'
      },
      {
        id: 'fa fa-microphone',
        text: '<span><i class="fa fa-microphone"></i> fa fa-microphone</span> ',
        html: '<span><i class="fa fa-microphone"></i> fa fa-microphone</span> ',
        title: 'fa fa-microphone'
      },
      {
        id: 'fa fa-microphone-slash',
        text: '<span><i class="fa fa-microphone-slash"></i> fa fa-microphone-slash</span> ',
        html: '<span><i class="fa fa-microphone-slash"></i> fa fa-microphone-slash</span> ',
        title: 'fa fa-microphone-slash'
      },
      {
        id: 'fa fa-minus',
        text: '<span><i class="fa fa-minus"></i> fa fa-minus</span> ',
        html: '<span><i class="fa fa-minus"></i> fa fa-minus</span> ',
        title: 'fa fa-minus'
      },
      {
        id: 'fa fa-minus-circle',
        text: '<span><i class="fa fa-minus-circle"></i> fa fa-minus-circle</span> ',
        html: '<span><i class="fa fa-minus-circle"></i> fa fa-minus-circle</span> ',
        title: 'fa fa-minus-circle'
      },
      {
        id: 'fa fa-minus-square',
        text: '<span><i class="fa fa-minus-square"></i> fa fa-minus-square</span> ',
        html: '<span><i class="fa fa-minus-square"></i> fa fa-minus-square</span> ',
        title: 'fa fa-minus-square'
      },
      {
        id: 'fa fa-minus-square-o',
        text: '<span><i class="fa fa-minus-square-o"></i> fa fa-minus-square-o</span> ',
        html: '<span><i class="fa fa-minus-square-o"></i> fa fa-minus-square-o</span> ',
        title: 'fa fa-minus-square-o'
      },
      {
        id: 'fa fa-mixcloud',
        text: '<span><i class="fa fa-mixcloud"></i> fa fa-mixcloud</span> ',
        html: '<span><i class="fa fa-mixcloud"></i> fa fa-mixcloud</span> ',
        title: 'fa fa-mixcloud'
      },
      {
        id: 'fa fa-mobile',
        text: '<span><i class="fa fa-mobile"></i> fa fa-mobile</span> ',
        html: '<span><i class="fa fa-mobile"></i> fa fa-mobile</span> ',
        title: 'fa fa-mobile'
      },
      {
        id: 'fa fa-mobile-phone',
        text: '<span><i class="fa fa-mobile-phone"></i> fa fa-mobile-phone</span> ',
        html: '<span><i class="fa fa-mobile-phone"></i> fa fa-mobile-phone</span> ',
        title: 'fa fa-mobile-phone'
      },
      {
        id: 'fa fa-modx',
        text: '<span><i class="fa fa-modx"></i> fa fa-modx</span> ',
        html: '<span><i class="fa fa-modx"></i> fa fa-modx</span> ',
        title: 'fa fa-modx'
      },
      {
        id: 'fa fa-money',
        text: '<span><i class="fa fa-money"></i> fa fa-money</span> ',
        html: '<span><i class="fa fa-money"></i> fa fa-money</span> ',
        title: 'fa fa-money'
      },
      {
        id: 'fa fa-moon-o',
        text: '<span><i class="fa fa-moon-o"></i> fa fa-moon-o</span> ',
        html: '<span><i class="fa fa-moon-o"></i> fa fa-moon-o</span> ',
        title: 'fa fa-moon-o'
      },
      {
        id: 'fa fa-mortar-board',
        text: '<span><i class="fa fa-mortar-board"></i> fa fa-mortar-board</span> ',
        html: '<span><i class="fa fa-mortar-board"></i> fa fa-mortar-board</span> ',
        title: 'fa fa-mortar-board'
      },
      {
        id: 'fa fa-motorcycle',
        text: '<span><i class="fa fa-motorcycle"></i> fa fa-motorcycle</span> ',
        html: '<span><i class="fa fa-motorcycle"></i> fa fa-motorcycle</span> ',
        title: 'fa fa-motorcycle'
      },
      {
        id: 'fa fa-mouse-pointer',
        text: '<span><i class="fa fa-mouse-pointer"></i> fa fa-mouse-pointer</span> ',
        html: '<span><i class="fa fa-mouse-pointer"></i> fa fa-mouse-pointer</span> ',
        title: 'fa fa-mouse-pointer'
      },
      {
        id: 'fa fa-music',
        text: '<span><i class="fa fa-music"></i> fa fa-music</span> ',
        html: '<span><i class="fa fa-music"></i> fa fa-music</span> ',
        title: 'fa fa-music'
      },
      {
        id: 'fa fa-navicon',
        text: '<span><i class="fa fa-navicon"></i> fa fa-navicon</span> ',
        html: '<span><i class="fa fa-navicon"></i> fa fa-navicon</span> ',
        title: 'fa fa-navicon'
      },
      {
        id: 'fa fa-neuter',
        text: '<span><i class="fa fa-neuter"></i> fa fa-neuter</span> ',
        html: '<span><i class="fa fa-neuter"></i> fa fa-neuter</span> ',
        title: 'fa fa-neuter'
      },
      {
        id: 'fa fa-newspaper-o',
        text: '<span><i class="fa fa-newspaper-o"></i> fa fa-newspaper-o</span> ',
        html: '<span><i class="fa fa-newspaper-o"></i> fa fa-newspaper-o</span> ',
        title: 'fa fa-newspaper-o'
      },
      {
        id: 'fa fa-object-group',
        text: '<span><i class="fa fa-object-group"></i> fa fa-object-group</span> ',
        html: '<span><i class="fa fa-object-group"></i> fa fa-object-group</span> ',
        title: 'fa fa-object-group'
      },
      {
        id: 'fa fa-object-ungroup',
        text: '<span><i class="fa fa-object-ungroup"></i> fa fa-object-ungroup</span> ',
        html: '<span><i class="fa fa-object-ungroup"></i> fa fa-object-ungroup</span> ',
        title: 'fa fa-object-ungroup'
      },
      {
        id: 'fa fa-odnoklassniki',
        text: '<span><i class="fa fa-odnoklassniki"></i> fa fa-odnoklassniki</span> ',
        html: '<span><i class="fa fa-odnoklassniki"></i> fa fa-odnoklassniki</span> ',
        title: 'fa fa-odnoklassniki'
      },
      {
        id: 'fa fa-odnoklassniki-square',
        text: '<span><i class="fa fa-odnoklassniki-square"></i> fa fa-odnoklassniki-square</span> ',
        html: '<span><i class="fa fa-odnoklassniki-square"></i> fa fa-odnoklassniki-square</span> ',
        title: 'fa fa-odnoklassniki-square'
      },
      {
        id: 'fa fa-opencart',
        text: '<span><i class="fa fa-opencart"></i> fa fa-opencart</span> ',
        html: '<span><i class="fa fa-opencart"></i> fa fa-opencart</span> ',
        title: 'fa fa-opencart'
      },
      {
        id: 'fa fa-openid',
        text: '<span><i class="fa fa-openid"></i> fa fa-openid</span> ',
        html: '<span><i class="fa fa-openid"></i> fa fa-openid</span> ',
        title: 'fa fa-openid'
      },
      {
        id: 'fa fa-opera',
        text: '<span><i class="fa fa-opera"></i> fa fa-opera</span> ',
        html: '<span><i class="fa fa-opera"></i> fa fa-opera</span> ',
        title: 'fa fa-opera'
      },
      {
        id: 'fa fa-optin-monster',
        text: '<span><i class="fa fa-optin-monster"></i> fa fa-optin-monster</span> ',
        html: '<span><i class="fa fa-optin-monster"></i> fa fa-optin-monster</span> ',
        title: 'fa fa-optin-monster'
      },
      {
        id: 'fa fa-outdent',
        text: '<span><i class="fa fa-outdent"></i> fa fa-outdent</span> ',
        html: '<span><i class="fa fa-outdent"></i> fa fa-outdent</span> ',
        title: 'fa fa-outdent'
      },
      {
        id: 'fa fa-pagelines',
        text: '<span><i class="fa fa-pagelines"></i> fa fa-pagelines</span> ',
        html: '<span><i class="fa fa-pagelines"></i> fa fa-pagelines</span> ',
        title: 'fa fa-pagelines'
      },
      {
        id: 'fa fa-paint-brush',
        text: '<span><i class="fa fa-paint-brush"></i> fa fa-paint-brush</span> ',
        html: '<span><i class="fa fa-paint-brush"></i> fa fa-paint-brush</span> ',
        title: 'fa fa-paint-brush'
      },
      {
        id: 'fa fa-paper-plane',
        text: '<span><i class="fa fa-paper-plane"></i> fa fa-paper-plane</span> ',
        html: '<span><i class="fa fa-paper-plane"></i> fa fa-paper-plane</span> ',
        title: 'fa fa-paper-plane'
      },
      {
        id: 'fa fa-paper-plane-o',
        text: '<span><i class="fa fa-paper-plane-o"></i> fa fa-paper-plane-o</span> ',
        html: '<span><i class="fa fa-paper-plane-o"></i> fa fa-paper-plane-o</span> ',
        title: 'fa fa-paper-plane-o'
      },
      {
        id: 'fa fa-paperclip',
        text: '<span><i class="fa fa-paperclip"></i> fa fa-paperclip</span> ',
        html: '<span><i class="fa fa-paperclip"></i> fa fa-paperclip</span> ',
        title: 'fa fa-paperclip'
      },
      {
        id: 'fa fa-paragraph',
        text: '<span><i class="fa fa-paragraph"></i> fa fa-paragraph</span> ',
        html: '<span><i class="fa fa-paragraph"></i> fa fa-paragraph</span> ',
        title: 'fa fa-paragraph'
      },
      {
        id: 'fa fa-paste',
        text: '<span><i class="fa fa-paste"></i> fa fa-paste</span> ',
        html: '<span><i class="fa fa-paste"></i> fa fa-paste</span> ',
        title: 'fa fa-paste'
      },
      {
        id: 'fa fa-pause',
        text: '<span><i class="fa fa-pause"></i> fa fa-pause</span> ',
        html: '<span><i class="fa fa-pause"></i> fa fa-pause</span> ',
        title: 'fa fa-pause'
      },
      {
        id: 'fa fa-pause-circle',
        text: '<span><i class="fa fa-pause-circle"></i> fa fa-pause-circle</span> ',
        html: '<span><i class="fa fa-pause-circle"></i> fa fa-pause-circle</span> ',
        title: 'fa fa-pause-circle'
      },
      {
        id: 'fa fa-pause-circle-o',
        text: '<span><i class="fa fa-pause-circle-o"></i> fa fa-pause-circle-o</span> ',
        html: '<span><i class="fa fa-pause-circle-o"></i> fa fa-pause-circle-o</span> ',
        title: 'fa fa-pause-circle-o'
      },
      {
        id: 'fa fa-paw',
        text: '<span><i class="fa fa-paw"></i> fa fa-paw</span> ',
        html: '<span><i class="fa fa-paw"></i> fa fa-paw</span> ',
        title: 'fa fa-paw'
      },
      {
        id: 'fa fa-paypal',
        text: '<span><i class="fa fa-paypal"></i> fa fa-paypal</span> ',
        html: '<span><i class="fa fa-paypal"></i> fa fa-paypal</span> ',
        title: 'fa fa-paypal'
      },
      {
        id: 'fa fa-pencil',
        text: '<span><i class="fa fa-pencil"></i> fa fa-pencil</span> ',
        html: '<span><i class="fa fa-pencil"></i> fa fa-pencil</span> ',
        title: 'fa fa-pencil'
      },
      {
        id: 'fa fa-pencil-square',
        text: '<span><i class="fa fa-pencil-square"></i> fa fa-pencil-square</span> ',
        html: '<span><i class="fa fa-pencil-square"></i> fa fa-pencil-square</span> ',
        title: 'fa fa-pencil-square'
      },
      {
        id: 'fa fa-pencil-square-o',
        text: '<span><i class="fa fa-pencil-square-o"></i> fa fa-pencil-square-o</span> ',
        html: '<span><i class="fa fa-pencil-square-o"></i> fa fa-pencil-square-o</span> ',
        title: 'fa fa-pencil-square-o'
      },
      {
        id: 'fa fa-percent',
        text: '<span><i class="fa fa-percent"></i> fa fa-percent</span> ',
        html: '<span><i class="fa fa-percent"></i> fa fa-percent</span> ',
        title: 'fa fa-percent'
      },
      {
        id: 'fa fa-phone',
        text: '<span><i class="fa fa-phone"></i> fa fa-phone</span> ',
        html: '<span><i class="fa fa-phone"></i> fa fa-phone</span> ',
        title: 'fa fa-phone'
      },
      {
        id: 'fa fa-phone-square',
        text: '<span><i class="fa fa-phone-square"></i> fa fa-phone-square</span> ',
        html: '<span><i class="fa fa-phone-square"></i> fa fa-phone-square</span> ',
        title: 'fa fa-phone-square'
      },
      {
        id: 'fa fa-photo',
        text: '<span><i class="fa fa-photo"></i> fa fa-photo</span> ',
        html: '<span><i class="fa fa-photo"></i> fa fa-photo</span> ',
        title: 'fa fa-photo'
      },
      {
        id: 'fa fa-picture-o',
        text: '<span><i class="fa fa-picture-o"></i> fa fa-picture-o</span> ',
        html: '<span><i class="fa fa-picture-o"></i> fa fa-picture-o</span> ',
        title: 'fa fa-picture-o'
      },
      {
        id: 'fa fa-pie-chart',
        text: '<span><i class="fa fa-pie-chart"></i> fa fa-pie-chart</span> ',
        html: '<span><i class="fa fa-pie-chart"></i> fa fa-pie-chart</span> ',
        title: 'fa fa-pie-chart'
      },
      {
        id: 'fa fa-pied-piper',
        text: '<span><i class="fa fa-pied-piper"></i> fa fa-pied-piper</span> ',
        html: '<span><i class="fa fa-pied-piper"></i> fa fa-pied-piper</span> ',
        title: 'fa fa-pied-piper'
      },
      {
        id: 'fa fa-pied-piper-alt',
        text: '<span><i class="fa fa-pied-piper-alt"></i> fa fa-pied-piper-alt</span> ',
        html: '<span><i class="fa fa-pied-piper-alt"></i> fa fa-pied-piper-alt</span> ',
        title: 'fa fa-pied-piper-alt'
      },
      {
        id: 'fa fa-pied-piper-pp',
        text: '<span><i class="fa fa-pied-piper-pp"></i> fa fa-pied-piper-pp</span> ',
        html: '<span><i class="fa fa-pied-piper-pp"></i> fa fa-pied-piper-pp</span> ',
        title: 'fa fa-pied-piper-pp'
      },
      {
        id: 'fa fa-pinterest',
        text: '<span><i class="fa fa-pinterest"></i> fa fa-pinterest</span> ',
        html: '<span><i class="fa fa-pinterest"></i> fa fa-pinterest</span> ',
        title: 'fa fa-pinterest'
      },
      {
        id: 'fa fa-pinterest-p',
        text: '<span><i class="fa fa-pinterest-p"></i> fa fa-pinterest-p</span> ',
        html: '<span><i class="fa fa-pinterest-p"></i> fa fa-pinterest-p</span> ',
        title: 'fa fa-pinterest-p'
      },
      {
        id: 'fa fa-pinterest-square',
        text: '<span><i class="fa fa-pinterest-square"></i> fa fa-pinterest-square</span> ',
        html: '<span><i class="fa fa-pinterest-square"></i> fa fa-pinterest-square</span> ',
        title: 'fa fa-pinterest-square'
      },
      {
        id: 'fa fa-plane',
        text: '<span><i class="fa fa-plane"></i> fa fa-plane</span> ',
        html: '<span><i class="fa fa-plane"></i> fa fa-plane</span> ',
        title: 'fa fa-plane'
      },
      {
        id: 'fa fa-play',
        text: '<span><i class="fa fa-play"></i> fa fa-play</span> ',
        html: '<span><i class="fa fa-play"></i> fa fa-play</span> ',
        title: 'fa fa-play'
      },
      {
        id: 'fa fa-play-circle',
        text: '<span><i class="fa fa-play-circle"></i> fa fa-play-circle</span> ',
        html: '<span><i class="fa fa-play-circle"></i> fa fa-play-circle</span> ',
        title: 'fa fa-play-circle'
      },
      {
        id: 'fa fa-play-circle-o',
        text: '<span><i class="fa fa-play-circle-o"></i> fa fa-play-circle-o</span> ',
        html: '<span><i class="fa fa-play-circle-o"></i> fa fa-play-circle-o</span> ',
        title: 'fa fa-play-circle-o'
      },
      {
        id: 'fa fa-plug',
        text: '<span><i class="fa fa-plug"></i> fa fa-plug</span> ',
        html: '<span><i class="fa fa-plug"></i> fa fa-plug</span> ',
        title: 'fa fa-plug'
      },
      {
        id: 'fa fa-plus',
        text: '<span><i class="fa fa-plus"></i> fa fa-plus</span> ',
        html: '<span><i class="fa fa-plus"></i> fa fa-plus</span> ',
        title: 'fa fa-plus'
      },
      {
        id: 'fa fa-plus-circle',
        text: '<span><i class="fa fa-plus-circle"></i> fa fa-plus-circle</span> ',
        html: '<span><i class="fa fa-plus-circle"></i> fa fa-plus-circle</span> ',
        title: 'fa fa-plus-circle'
      },
      {
        id: 'fa fa-plus-square',
        text: '<span><i class="fa fa-plus-square"></i> fa fa-plus-square</span> ',
        html: '<span><i class="fa fa-plus-square"></i> fa fa-plus-square</span> ',
        title: 'fa fa-plus-square'
      },
      {
        id: 'fa fa-plus-square-o',
        text: '<span><i class="fa fa-plus-square-o"></i> fa fa-plus-square-o</span> ',
        html: '<span><i class="fa fa-plus-square-o"></i> fa fa-plus-square-o</span> ',
        title: 'fa fa-plus-square-o'
      },
      {
        id: 'fa fa-podcast',
        text: '<span><i class="fa fa-podcast"></i> fa fa-podcast</span> ',
        html: '<span><i class="fa fa-podcast"></i> fa fa-podcast</span> ',
        title: 'fa fa-podcast'
      },
      {
        id: 'fa fa-power-off',
        text: '<span><i class="fa fa-power-off"></i> fa fa-power-off</span> ',
        html: '<span><i class="fa fa-power-off"></i> fa fa-power-off</span> ',
        title: 'fa fa-power-off'
      },
      {
        id: 'fa fa-print',
        text: '<span><i class="fa fa-print"></i> fa fa-print</span> ',
        html: '<span><i class="fa fa-print"></i> fa fa-print</span> ',
        title: 'fa fa-print'
      },
      {
        id: 'fa fa-product-hunt',
        text: '<span><i class="fa fa-product-hunt"></i> fa fa-product-hunt</span> ',
        html: '<span><i class="fa fa-product-hunt"></i> fa fa-product-hunt</span> ',
        title: 'fa fa-product-hunt'
      },
      {
        id: 'fa fa-puzzle-piece',
        text: '<span><i class="fa fa-puzzle-piece"></i> fa fa-puzzle-piece</span> ',
        html: '<span><i class="fa fa-puzzle-piece"></i> fa fa-puzzle-piece</span> ',
        title: 'fa fa-puzzle-piece'
      },
      {
        id: 'fa fa-qq',
        text: '<span><i class="fa fa-qq"></i> fa fa-qq</span> ',
        html: '<span><i class="fa fa-qq"></i> fa fa-qq</span> ',
        title: 'fa fa-qq'
      },
      {
        id: 'fa fa-qrcode',
        text: '<span><i class="fa fa-qrcode"></i> fa fa-qrcode</span> ',
        html: '<span><i class="fa fa-qrcode"></i> fa fa-qrcode</span> ',
        title: 'fa fa-qrcode'
      },
      {
        id: 'fa fa-question',
        text: '<span><i class="fa fa-question"></i> fa fa-question</span> ',
        html: '<span><i class="fa fa-question"></i> fa fa-question</span> ',
        title: 'fa fa-question'
      },
      {
        id: 'fa fa-question-circle',
        text: '<span><i class="fa fa-question-circle"></i> fa fa-question-circle</span> ',
        html: '<span><i class="fa fa-question-circle"></i> fa fa-question-circle</span> ',
        title: 'fa fa-question-circle'
      },
      {
        id: 'fa fa-question-circle-o',
        text: '<span><i class="fa fa-question-circle-o"></i> fa fa-question-circle-o</span> ',
        html: '<span><i class="fa fa-question-circle-o"></i> fa fa-question-circle-o</span> ',
        title: 'fa fa-question-circle-o'
      },
      {
        id: 'fa fa-quora',
        text: '<span><i class="fa fa-quora"></i> fa fa-quora</span> ',
        html: '<span><i class="fa fa-quora"></i> fa fa-quora</span> ',
        title: 'fa fa-quora'
      },
      {
        id: 'fa fa-quote-left',
        text: '<span><i class="fa fa-quote-left"></i> fa fa-quote-left</span> ',
        html: '<span><i class="fa fa-quote-left"></i> fa fa-quote-left</span> ',
        title: 'fa fa-quote-left'
      },
      {
        id: 'fa fa-quote-right',
        text: '<span><i class="fa fa-quote-right"></i> fa fa-quote-right</span> ',
        html: '<span><i class="fa fa-quote-right"></i> fa fa-quote-right</span> ',
        title: 'fa fa-quote-right'
      },
      {
        id: 'fa fa-ra',
        text: '<span><i class="fa fa-ra"></i> fa fa-ra</span> ',
        html: '<span><i class="fa fa-ra"></i> fa fa-ra</span> ',
        title: 'fa fa-ra'
      },
      {
        id: 'fa fa-random',
        text: '<span><i class="fa fa-random"></i> fa fa-random</span> ',
        html: '<span><i class="fa fa-random"></i> fa fa-random</span> ',
        title: 'fa fa-random'
      },
      {
        id: 'fa fa-ravelry',
        text: '<span><i class="fa fa-ravelry"></i> fa fa-ravelry</span> ',
        html: '<span><i class="fa fa-ravelry"></i> fa fa-ravelry</span> ',
        title: 'fa fa-ravelry'
      },
      {
        id: 'fa fa-rebel',
        text: '<span><i class="fa fa-rebel"></i> fa fa-rebel</span> ',
        html: '<span><i class="fa fa-rebel"></i> fa fa-rebel</span> ',
        title: 'fa fa-rebel'
      },
      {
        id: 'fa fa-recycle',
        text: '<span><i class="fa fa-recycle"></i> fa fa-recycle</span> ',
        html: '<span><i class="fa fa-recycle"></i> fa fa-recycle</span> ',
        title: 'fa fa-recycle'
      },
      {
        id: 'fa fa-reddit',
        text: '<span><i class="fa fa-reddit"></i> fa fa-reddit</span> ',
        html: '<span><i class="fa fa-reddit"></i> fa fa-reddit</span> ',
        title: 'fa fa-reddit'
      },
      {
        id: 'fa fa-reddit-alien',
        text: '<span><i class="fa fa-reddit-alien"></i> fa fa-reddit-alien</span> ',
        html: '<span><i class="fa fa-reddit-alien"></i> fa fa-reddit-alien</span> ',
        title: 'fa fa-reddit-alien'
      },
      {
        id: 'fa fa-reddit-square',
        text: '<span><i class="fa fa-reddit-square"></i> fa fa-reddit-square</span> ',
        html: '<span><i class="fa fa-reddit-square"></i> fa fa-reddit-square</span> ',
        title: 'fa fa-reddit-square'
      },
      {
        id: 'fa fa-refresh',
        text: '<span><i class="fa fa-refresh"></i> fa fa-refresh</span> ',
        html: '<span><i class="fa fa-refresh"></i> fa fa-refresh</span> ',
        title: 'fa fa-refresh'
      },
      {
        id: 'fa fa-registered',
        text: '<span><i class="fa fa-registered"></i> fa fa-registered</span> ',
        html: '<span><i class="fa fa-registered"></i> fa fa-registered</span> ',
        title: 'fa fa-registered'
      },
      {
        id: 'fa fa-remove',
        text: '<span><i class="fa fa-remove"></i> fa fa-remove</span> ',
        html: '<span><i class="fa fa-remove"></i> fa fa-remove</span> ',
        title: 'fa fa-remove'
      },
      {
        id: 'fa fa-renren',
        text: '<span><i class="fa fa-renren"></i> fa fa-renren</span> ',
        html: '<span><i class="fa fa-renren"></i> fa fa-renren</span> ',
        title: 'fa fa-renren'
      },
      {
        id: 'fa fa-reorder',
        text: '<span><i class="fa fa-reorder"></i> fa fa-reorder</span> ',
        html: '<span><i class="fa fa-reorder"></i> fa fa-reorder</span> ',
        title: 'fa fa-reorder'
      },
      {
        id: 'fa fa-repeat',
        text: '<span><i class="fa fa-repeat"></i> fa fa-repeat</span> ',
        html: '<span><i class="fa fa-repeat"></i> fa fa-repeat</span> ',
        title: 'fa fa-repeat'
      },
      {
        id: 'fa fa-reply',
        text: '<span><i class="fa fa-reply"></i> fa fa-reply</span> ',
        html: '<span><i class="fa fa-reply"></i> fa fa-reply</span> ',
        title: 'fa fa-reply'
      },
      {
        id: 'fa fa-reply-all',
        text: '<span><i class="fa fa-reply-all"></i> fa fa-reply-all</span> ',
        html: '<span><i class="fa fa-reply-all"></i> fa fa-reply-all</span> ',
        title: 'fa fa-reply-all'
      },
      {
        id: 'fa fa-resistance',
        text: '<span><i class="fa fa-resistance"></i> fa fa-resistance</span> ',
        html: '<span><i class="fa fa-resistance"></i> fa fa-resistance</span> ',
        title: 'fa fa-resistance'
      },
      {
        id: 'fa fa-retweet',
        text: '<span><i class="fa fa-retweet"></i> fa fa-retweet</span> ',
        html: '<span><i class="fa fa-retweet"></i> fa fa-retweet</span> ',
        title: 'fa fa-retweet'
      },
      {
        id: 'fa fa-rmb',
        text: '<span><i class="fa fa-rmb"></i> fa fa-rmb</span> ',
        html: '<span><i class="fa fa-rmb"></i> fa fa-rmb</span> ',
        title: 'fa fa-rmb'
      },
      {
        id: 'fa fa-road',
        text: '<span><i class="fa fa-road"></i> fa fa-road</span> ',
        html: '<span><i class="fa fa-road"></i> fa fa-road</span> ',
        title: 'fa fa-road'
      },
      {
        id: 'fa fa-rocket',
        text: '<span><i class="fa fa-rocket"></i> fa fa-rocket</span> ',
        html: '<span><i class="fa fa-rocket"></i> fa fa-rocket</span> ',
        title: 'fa fa-rocket'
      },
      {
        id: 'fa fa-rotate-left',
        text: '<span><i class="fa fa-rotate-left"></i> fa fa-rotate-left</span> ',
        html: '<span><i class="fa fa-rotate-left"></i> fa fa-rotate-left</span> ',
        title: 'fa fa-rotate-left'
      },
      {
        id: 'fa fa-rotate-right',
        text: '<span><i class="fa fa-rotate-right"></i> fa fa-rotate-right</span> ',
        html: '<span><i class="fa fa-rotate-right"></i> fa fa-rotate-right</span> ',
        title: 'fa fa-rotate-right'
      },
      {
        id: 'fa fa-rouble',
        text: '<span><i class="fa fa-rouble"></i> fa fa-rouble</span> ',
        html: '<span><i class="fa fa-rouble"></i> fa fa-rouble</span> ',
        title: 'fa fa-rouble'
      },
      {
        id: 'fa fa-rss',
        text: '<span><i class="fa fa-rss"></i> fa fa-rss</span> ',
        html: '<span><i class="fa fa-rss"></i> fa fa-rss</span> ',
        title: 'fa fa-rss'
      },
      {
        id: 'fa fa-rss-square',
        text: '<span><i class="fa fa-rss-square"></i> fa fa-rss-square</span> ',
        html: '<span><i class="fa fa-rss-square"></i> fa fa-rss-square</span> ',
        title: 'fa fa-rss-square'
      },
      {
        id: 'fa fa-rub',
        text: '<span><i class="fa fa-rub"></i> fa fa-rub</span> ',
        html: '<span><i class="fa fa-rub"></i> fa fa-rub</span> ',
        title: 'fa fa-rub'
      },
      {
        id: 'fa fa-ruble',
        text: '<span><i class="fa fa-ruble"></i> fa fa-ruble</span> ',
        html: '<span><i class="fa fa-ruble"></i> fa fa-ruble</span> ',
        title: 'fa fa-ruble'
      },
      {
        id: 'fa fa-rupee',
        text: '<span><i class="fa fa-rupee"></i> fa fa-rupee</span> ',
        html: '<span><i class="fa fa-rupee"></i> fa fa-rupee</span> ',
        title: 'fa fa-rupee'
      },
      {
        id: 'fa fa-s15',
        text: '<span><i class="fa fa-s15"></i> fa fa-s15</span> ',
        html: '<span><i class="fa fa-s15"></i> fa fa-s15</span> ',
        title: 'fa fa-s15'
      },
      {
        id: 'fa fa-safari',
        text: '<span><i class="fa fa-safari"></i> fa fa-safari</span> ',
        html: '<span><i class="fa fa-safari"></i> fa fa-safari</span> ',
        title: 'fa fa-safari'
      },
      {
        id: 'fa fa-save',
        text: '<span><i class="fa fa-save"></i> fa fa-save</span> ',
        html: '<span><i class="fa fa-save"></i> fa fa-save</span> ',
        title: 'fa fa-save'
      },
      {
        id: 'fa fa-scissors',
        text: '<span><i class="fa fa-scissors"></i> fa fa-scissors</span> ',
        html: '<span><i class="fa fa-scissors"></i> fa fa-scissors</span> ',
        title: 'fa fa-scissors'
      },
      {
        id: 'fa fa-scribd',
        text: '<span><i class="fa fa-scribd"></i> fa fa-scribd</span> ',
        html: '<span><i class="fa fa-scribd"></i> fa fa-scribd</span> ',
        title: 'fa fa-scribd'
      },
      {
        id: 'fa fa-search',
        text: '<span><i class="fa fa-search"></i> fa fa-search</span> ',
        html: '<span><i class="fa fa-search"></i> fa fa-search</span> ',
        title: 'fa fa-search'
      },
      {
        id: 'fa fa-search-minus',
        text: '<span><i class="fa fa-search-minus"></i> fa fa-search-minus</span> ',
        html: '<span><i class="fa fa-search-minus"></i> fa fa-search-minus</span> ',
        title: 'fa fa-search-minus'
      },
      {
        id: 'fa fa-search-plus',
        text: '<span><i class="fa fa-search-plus"></i> fa fa-search-plus</span> ',
        html: '<span><i class="fa fa-search-plus"></i> fa fa-search-plus</span> ',
        title: 'fa fa-search-plus'
      },
      {
        id: 'fa fa-sellsy',
        text: '<span><i class="fa fa-sellsy"></i> fa fa-sellsy</span> ',
        html: '<span><i class="fa fa-sellsy"></i> fa fa-sellsy</span> ',
        title: 'fa fa-sellsy'
      },
      {
        id: 'fa fa-send',
        text: '<span><i class="fa fa-send"></i> fa fa-send</span> ',
        html: '<span><i class="fa fa-send"></i> fa fa-send</span> ',
        title: 'fa fa-send'
      },
      {
        id: 'fa fa-send-o',
        text: '<span><i class="fa fa-send-o"></i> fa fa-send-o</span> ',
        html: '<span><i class="fa fa-send-o"></i> fa fa-send-o</span> ',
        title: 'fa fa-send-o'
      },
      {
        id: 'fa fa-server',
        text: '<span><i class="fa fa-server"></i> fa fa-server</span> ',
        html: '<span><i class="fa fa-server"></i> fa fa-server</span> ',
        title: 'fa fa-server'
      },
      {
        id: 'fa fa-share',
        text: '<span><i class="fa fa-share"></i> fa fa-share</span> ',
        html: '<span><i class="fa fa-share"></i> fa fa-share</span> ',
        title: 'fa fa-share'
      },
      {
        id: 'fa fa-share-alt',
        text: '<span><i class="fa fa-share-alt"></i> fa fa-share-alt</span> ',
        html: '<span><i class="fa fa-share-alt"></i> fa fa-share-alt</span> ',
        title: 'fa fa-share-alt'
      },
      {
        id: 'fa fa-share-alt-square',
        text: '<span><i class="fa fa-share-alt-square"></i> fa fa-share-alt-square</span> ',
        html: '<span><i class="fa fa-share-alt-square"></i> fa fa-share-alt-square</span> ',
        title: 'fa fa-share-alt-square'
      },
      {
        id: 'fa fa-share-square',
        text: '<span><i class="fa fa-share-square"></i> fa fa-share-square</span> ',
        html: '<span><i class="fa fa-share-square"></i> fa fa-share-square</span> ',
        title: 'fa fa-share-square'
      },
      {
        id: 'fa fa-share-square-o',
        text: '<span><i class="fa fa-share-square-o"></i> fa fa-share-square-o</span> ',
        html: '<span><i class="fa fa-share-square-o"></i> fa fa-share-square-o</span> ',
        title: 'fa fa-share-square-o'
      },
      {
        id: 'fa fa-shekel',
        text: '<span><i class="fa fa-shekel"></i> fa fa-shekel</span> ',
        html: '<span><i class="fa fa-shekel"></i> fa fa-shekel</span> ',
        title: 'fa fa-shekel'
      },
      {
        id: 'fa fa-sheqel',
        text: '<span><i class="fa fa-sheqel"></i> fa fa-sheqel</span> ',
        html: '<span><i class="fa fa-sheqel"></i> fa fa-sheqel</span> ',
        title: 'fa fa-sheqel'
      },
      {
        id: 'fa fa-shield',
        text: '<span><i class="fa fa-shield"></i> fa fa-shield</span> ',
        html: '<span><i class="fa fa-shield"></i> fa fa-shield</span> ',
        title: 'fa fa-shield'
      },
      {
        id: 'fa fa-ship',
        text: '<span><i class="fa fa-ship"></i> fa fa-ship</span> ',
        html: '<span><i class="fa fa-ship"></i> fa fa-ship</span> ',
        title: 'fa fa-ship'
      },
      {
        id: 'fa fa-shirtsinbulk',
        text: '<span><i class="fa fa-shirtsinbulk"></i> fa fa-shirtsinbulk</span> ',
        html: '<span><i class="fa fa-shirtsinbulk"></i> fa fa-shirtsinbulk</span> ',
        title: 'fa fa-shirtsinbulk'
      },
      {
        id: 'fa fa-shopping-bag',
        text: '<span><i class="fa fa-shopping-bag"></i> fa fa-shopping-bag</span> ',
        html: '<span><i class="fa fa-shopping-bag"></i> fa fa-shopping-bag</span> ',
        title: 'fa fa-shopping-bag'
      },
      {
        id: 'fa fa-shopping-basket',
        text: '<span><i class="fa fa-shopping-basket"></i> fa fa-shopping-basket</span> ',
        html: '<span><i class="fa fa-shopping-basket"></i> fa fa-shopping-basket</span> ',
        title: 'fa fa-shopping-basket'
      },
      {
        id: 'fa fa-shopping-cart',
        text: '<span><i class="fa fa-shopping-cart"></i> fa fa-shopping-cart</span> ',
        html: '<span><i class="fa fa-shopping-cart"></i> fa fa-shopping-cart</span> ',
        title: 'fa fa-shopping-cart'
      },
      {
        id: 'fa fa-shower',
        text: '<span><i class="fa fa-shower"></i> fa fa-shower</span> ',
        html: '<span><i class="fa fa-shower"></i> fa fa-shower</span> ',
        title: 'fa fa-shower'
      },
      {
        id: 'fa fa-sign-in',
        text: '<span><i class="fa fa-sign-in"></i> fa fa-sign-in</span> ',
        html: '<span><i class="fa fa-sign-in"></i> fa fa-sign-in</span> ',
        title: 'fa fa-sign-in'
      },
      {
        id: 'fa fa-sign-language',
        text: '<span><i class="fa fa-sign-language"></i> fa fa-sign-language</span> ',
        html: '<span><i class="fa fa-sign-language"></i> fa fa-sign-language</span> ',
        title: 'fa fa-sign-language'
      },
      {
        id: 'fa fa-sign-out',
        text: '<span><i class="fa fa-sign-out"></i> fa fa-sign-out</span> ',
        html: '<span><i class="fa fa-sign-out"></i> fa fa-sign-out</span> ',
        title: 'fa fa-sign-out'
      },
      {
        id: 'fa fa-signal',
        text: '<span><i class="fa fa-signal"></i> fa fa-signal</span> ',
        html: '<span><i class="fa fa-signal"></i> fa fa-signal</span> ',
        title: 'fa fa-signal'
      },
      {
        id: 'fa fa-signing',
        text: '<span><i class="fa fa-signing"></i> fa fa-signing</span> ',
        html: '<span><i class="fa fa-signing"></i> fa fa-signing</span> ',
        title: 'fa fa-signing'
      },
      {
        id: 'fa fa-simplybuilt',
        text: '<span><i class="fa fa-simplybuilt"></i> fa fa-simplybuilt</span> ',
        html: '<span><i class="fa fa-simplybuilt"></i> fa fa-simplybuilt</span> ',
        title: 'fa fa-simplybuilt'
      },
      {
        id: 'fa fa-sitemap',
        text: '<span><i class="fa fa-sitemap"></i> fa fa-sitemap</span> ',
        html: '<span><i class="fa fa-sitemap"></i> fa fa-sitemap</span> ',
        title: 'fa fa-sitemap'
      },
      {
        id: 'fa fa-skyatlas',
        text: '<span><i class="fa fa-skyatlas"></i> fa fa-skyatlas</span> ',
        html: '<span><i class="fa fa-skyatlas"></i> fa fa-skyatlas</span> ',
        title: 'fa fa-skyatlas'
      },
      {
        id: 'fa fa-skype',
        text: '<span><i class="fa fa-skype"></i> fa fa-skype</span> ',
        html: '<span><i class="fa fa-skype"></i> fa fa-skype</span> ',
        title: 'fa fa-skype'
      },
      {
        id: 'fa fa-slack',
        text: '<span><i class="fa fa-slack"></i> fa fa-slack</span> ',
        html: '<span><i class="fa fa-slack"></i> fa fa-slack</span> ',
        title: 'fa fa-slack'
      },
      {
        id: 'fa fa-sliders',
        text: '<span><i class="fa fa-sliders"></i> fa fa-sliders</span> ',
        html: '<span><i class="fa fa-sliders"></i> fa fa-sliders</span> ',
        title: 'fa fa-sliders'
      },
      {
        id: 'fa fa-slideshare',
        text: '<span><i class="fa fa-slideshare"></i> fa fa-slideshare</span> ',
        html: '<span><i class="fa fa-slideshare"></i> fa fa-slideshare</span> ',
        title: 'fa fa-slideshare'
      },
      {
        id: 'fa fa-smile-o',
        text: '<span><i class="fa fa-smile-o"></i> fa fa-smile-o</span> ',
        html: '<span><i class="fa fa-smile-o"></i> fa fa-smile-o</span> ',
        title: 'fa fa-smile-o'
      },
      {
        id: 'fa fa-snapchat',
        text: '<span><i class="fa fa-snapchat"></i> fa fa-snapchat</span> ',
        html: '<span><i class="fa fa-snapchat"></i> fa fa-snapchat</span> ',
        title: 'fa fa-snapchat'
      },
      {
        id: 'fa fa-snapchat-ghost',
        text: '<span><i class="fa fa-snapchat-ghost"></i> fa fa-snapchat-ghost</span> ',
        html: '<span><i class="fa fa-snapchat-ghost"></i> fa fa-snapchat-ghost</span> ',
        title: 'fa fa-snapchat-ghost'
      },
      {
        id: 'fa fa-snapchat-square',
        text: '<span><i class="fa fa-snapchat-square"></i> fa fa-snapchat-square</span> ',
        html: '<span><i class="fa fa-snapchat-square"></i> fa fa-snapchat-square</span> ',
        title: 'fa fa-snapchat-square'
      },
      {
        id: 'fa fa-snowflake-o',
        text: '<span><i class="fa fa-snowflake-o"></i> fa fa-snowflake-o</span> ',
        html: '<span><i class="fa fa-snowflake-o"></i> fa fa-snowflake-o</span> ',
        title: 'fa fa-snowflake-o'
      },
      {
        id: 'fa fa-soccer-ball-o',
        text: '<span><i class="fa fa-soccer-ball-o"></i> fa fa-soccer-ball-o</span> ',
        html: '<span><i class="fa fa-soccer-ball-o"></i> fa fa-soccer-ball-o</span> ',
        title: 'fa fa-soccer-ball-o'
      },
      {
        id: 'fa fa-sort',
        text: '<span><i class="fa fa-sort"></i> fa fa-sort</span> ',
        html: '<span><i class="fa fa-sort"></i> fa fa-sort</span> ',
        title: 'fa fa-sort'
      },
      {
        id: 'fa fa-sort-alpha-asc',
        text: '<span><i class="fa fa-sort-alpha-asc"></i> fa fa-sort-alpha-asc</span> ',
        html: '<span><i class="fa fa-sort-alpha-asc"></i> fa fa-sort-alpha-asc</span> ',
        title: 'fa fa-sort-alpha-asc'
      },
      {
        id: 'fa fa-sort-alpha-desc',
        text: '<span><i class="fa fa-sort-alpha-desc"></i> fa fa-sort-alpha-desc</span> ',
        html: '<span><i class="fa fa-sort-alpha-desc"></i> fa fa-sort-alpha-desc</span> ',
        title: 'fa fa-sort-alpha-desc'
      },
      {
        id: 'fa fa-sort-amount-asc',
        text: '<span><i class="fa fa-sort-amount-asc"></i> fa fa-sort-amount-asc</span> ',
        html: '<span><i class="fa fa-sort-amount-asc"></i> fa fa-sort-amount-asc</span> ',
        title: 'fa fa-sort-amount-asc'
      },
      {
        id: 'fa fa-sort-amount-desc',
        text: '<span><i class="fa fa-sort-amount-desc"></i> fa fa-sort-amount-desc</span> ',
        html: '<span><i class="fa fa-sort-amount-desc"></i> fa fa-sort-amount-desc</span> ',
        title: 'fa fa-sort-amount-desc'
      },
      {
        id: 'fa fa-sort-asc',
        text: '<span><i class="fa fa-sort-asc"></i> fa fa-sort-asc</span> ',
        html: '<span><i class="fa fa-sort-asc"></i> fa fa-sort-asc</span> ',
        title: 'fa fa-sort-asc'
      },
      {
        id: 'fa fa-sort-desc',
        text: '<span><i class="fa fa-sort-desc"></i> fa fa-sort-desc</span> ',
        html: '<span><i class="fa fa-sort-desc"></i> fa fa-sort-desc</span> ',
        title: 'fa fa-sort-desc'
      },
      {
        id: 'fa fa-sort-down',
        text: '<span><i class="fa fa-sort-down"></i> fa fa-sort-down</span> ',
        html: '<span><i class="fa fa-sort-down"></i> fa fa-sort-down</span> ',
        title: 'fa fa-sort-down'
      },
      {
        id: 'fa fa-sort-numeric-asc',
        text: '<span><i class="fa fa-sort-numeric-asc"></i> fa fa-sort-numeric-asc</span> ',
        html: '<span><i class="fa fa-sort-numeric-asc"></i> fa fa-sort-numeric-asc</span> ',
        title: 'fa fa-sort-numeric-asc'
      },
      {
        id: 'fa fa-sort-numeric-desc',
        text: '<span><i class="fa fa-sort-numeric-desc"></i> fa fa-sort-numeric-desc</span> ',
        html: '<span><i class="fa fa-sort-numeric-desc"></i> fa fa-sort-numeric-desc</span> ',
        title: 'fa fa-sort-numeric-desc'
      },
      {
        id: 'fa fa-sort-up',
        text: '<span><i class="fa fa-sort-up"></i> fa fa-sort-up</span> ',
        html: '<span><i class="fa fa-sort-up"></i> fa fa-sort-up</span> ',
        title: 'fa fa-sort-up'
      },
      {
        id: 'fa fa-soundcloud',
        text: '<span><i class="fa fa-soundcloud"></i> fa fa-soundcloud</span> ',
        html: '<span><i class="fa fa-soundcloud"></i> fa fa-soundcloud</span> ',
        title: 'fa fa-soundcloud'
      },
      {
        id: 'fa fa-space-shuttle',
        text: '<span><i class="fa fa-space-shuttle"></i> fa fa-space-shuttle</span> ',
        html: '<span><i class="fa fa-space-shuttle"></i> fa fa-space-shuttle</span> ',
        title: 'fa fa-space-shuttle'
      },
      {
        id: 'fa fa-spinner',
        text: '<span><i class="fa fa-spinner"></i> fa fa-spinner</span> ',
        html: '<span><i class="fa fa-spinner"></i> fa fa-spinner</span> ',
        title: 'fa fa-spinner'
      },
      {
        id: 'fa fa-spoon',
        text: '<span><i class="fa fa-spoon"></i> fa fa-spoon</span> ',
        html: '<span><i class="fa fa-spoon"></i> fa fa-spoon</span> ',
        title: 'fa fa-spoon'
      },
      {
        id: 'fa fa-spotify',
        text: '<span><i class="fa fa-spotify"></i> fa fa-spotify</span> ',
        html: '<span><i class="fa fa-spotify"></i> fa fa-spotify</span> ',
        title: 'fa fa-spotify'
      },
      {
        id: 'fa fa-square',
        text: '<span><i class="fa fa-square"></i> fa fa-square</span> ',
        html: '<span><i class="fa fa-square"></i> fa fa-square</span> ',
        title: 'fa fa-square'
      },
      {
        id: 'fa fa-square-o',
        text: '<span><i class="fa fa-square-o"></i> fa fa-square-o</span> ',
        html: '<span><i class="fa fa-square-o"></i> fa fa-square-o</span> ',
        title: 'fa fa-square-o'
      },
      {
        id: 'fa fa-stack-exchange',
        text: '<span><i class="fa fa-stack-exchange"></i> fa fa-stack-exchange</span> ',
        html: '<span><i class="fa fa-stack-exchange"></i> fa fa-stack-exchange</span> ',
        title: 'fa fa-stack-exchange'
      },
      {
        id: 'fa fa-stack-overflow',
        text: '<span><i class="fa fa-stack-overflow"></i> fa fa-stack-overflow</span> ',
        html: '<span><i class="fa fa-stack-overflow"></i> fa fa-stack-overflow</span> ',
        title: 'fa fa-stack-overflow'
      },
      {
        id: 'fa fa-star',
        text: '<span><i class="fa fa-star"></i> fa fa-star</span> ',
        html: '<span><i class="fa fa-star"></i> fa fa-star</span> ',
        title: 'fa fa-star'
      },
      {
        id: 'fa fa-star-half',
        text: '<span><i class="fa fa-star-half"></i> fa fa-star-half</span> ',
        html: '<span><i class="fa fa-star-half"></i> fa fa-star-half</span> ',
        title: 'fa fa-star-half'
      },
      {
        id: 'fa fa-star-half-empty',
        text: '<span><i class="fa fa-star-half-empty"></i> fa fa-star-half-empty</span> ',
        html: '<span><i class="fa fa-star-half-empty"></i> fa fa-star-half-empty</span> ',
        title: 'fa fa-star-half-empty'
      },
      {
        id: 'fa fa-star-half-full',
        text: '<span><i class="fa fa-star-half-full"></i> fa fa-star-half-full</span> ',
        html: '<span><i class="fa fa-star-half-full"></i> fa fa-star-half-full</span> ',
        title: 'fa fa-star-half-full'
      },
      {
        id: 'fa fa-star-half-o',
        text: '<span><i class="fa fa-star-half-o"></i> fa fa-star-half-o</span> ',
        html: '<span><i class="fa fa-star-half-o"></i> fa fa-star-half-o</span> ',
        title: 'fa fa-star-half-o'
      },
      {
        id: 'fa fa-star-o',
        text: '<span><i class="fa fa-star-o"></i> fa fa-star-o</span> ',
        html: '<span><i class="fa fa-star-o"></i> fa fa-star-o</span> ',
        title: 'fa fa-star-o'
      },
      {
        id: 'fa fa-steam',
        text: '<span><i class="fa fa-steam"></i> fa fa-steam</span> ',
        html: '<span><i class="fa fa-steam"></i> fa fa-steam</span> ',
        title: 'fa fa-steam'
      },
      {
        id: 'fa fa-steam-square',
        text: '<span><i class="fa fa-steam-square"></i> fa fa-steam-square</span> ',
        html: '<span><i class="fa fa-steam-square"></i> fa fa-steam-square</span> ',
        title: 'fa fa-steam-square'
      },
      {
        id: 'fa fa-step-backward',
        text: '<span><i class="fa fa-step-backward"></i> fa fa-step-backward</span> ',
        html: '<span><i class="fa fa-step-backward"></i> fa fa-step-backward</span> ',
        title: 'fa fa-step-backward'
      },
      {
        id: 'fa fa-step-forward',
        text: '<span><i class="fa fa-step-forward"></i> fa fa-step-forward</span> ',
        html: '<span><i class="fa fa-step-forward"></i> fa fa-step-forward</span> ',
        title: 'fa fa-step-forward'
      },
      {
        id: 'fa fa-stethoscope',
        text: '<span><i class="fa fa-stethoscope"></i> fa fa-stethoscope</span> ',
        html: '<span><i class="fa fa-stethoscope"></i> fa fa-stethoscope</span> ',
        title: 'fa fa-stethoscope'
      },
      {
        id: 'fa fa-sticky-note',
        text: '<span><i class="fa fa-sticky-note"></i> fa fa-sticky-note</span> ',
        html: '<span><i class="fa fa-sticky-note"></i> fa fa-sticky-note</span> ',
        title: 'fa fa-sticky-note'
      },
      {
        id: 'fa fa-sticky-note-o',
        text: '<span><i class="fa fa-sticky-note-o"></i> fa fa-sticky-note-o</span> ',
        html: '<span><i class="fa fa-sticky-note-o"></i> fa fa-sticky-note-o</span> ',
        title: 'fa fa-sticky-note-o'
      },
      {
        id: 'fa fa-stop',
        text: '<span><i class="fa fa-stop"></i> fa fa-stop</span> ',
        html: '<span><i class="fa fa-stop"></i> fa fa-stop</span> ',
        title: 'fa fa-stop'
      },
      {
        id: 'fa fa-stop-circle',
        text: '<span><i class="fa fa-stop-circle"></i> fa fa-stop-circle</span> ',
        html: '<span><i class="fa fa-stop-circle"></i> fa fa-stop-circle</span> ',
        title: 'fa fa-stop-circle'
      },
      {
        id: 'fa fa-stop-circle-o',
        text: '<span><i class="fa fa-stop-circle-o"></i> fa fa-stop-circle-o</span> ',
        html: '<span><i class="fa fa-stop-circle-o"></i> fa fa-stop-circle-o</span> ',
        title: 'fa fa-stop-circle-o'
      },
      {
        id: 'fa fa-street-view',
        text: '<span><i class="fa fa-street-view"></i> fa fa-street-view</span> ',
        html: '<span><i class="fa fa-street-view"></i> fa fa-street-view</span> ',
        title: 'fa fa-street-view'
      },
      {
        id: 'fa fa-strikethrough',
        text: '<span><i class="fa fa-strikethrough"></i> fa fa-strikethrough</span> ',
        html: '<span><i class="fa fa-strikethrough"></i> fa fa-strikethrough</span> ',
        title: 'fa fa-strikethrough'
      },
      {
        id: 'fa fa-stumbleupon',
        text: '<span><i class="fa fa-stumbleupon"></i> fa fa-stumbleupon</span> ',
        html: '<span><i class="fa fa-stumbleupon"></i> fa fa-stumbleupon</span> ',
        title: 'fa fa-stumbleupon'
      },
      {
        id: 'fa fa-stumbleupon-circle',
        text: '<span><i class="fa fa-stumbleupon-circle"></i> fa fa-stumbleupon-circle</span> ',
        html: '<span><i class="fa fa-stumbleupon-circle"></i> fa fa-stumbleupon-circle</span> ',
        title: 'fa fa-stumbleupon-circle'
      },
      {
        id: 'fa fa-subscript',
        text: '<span><i class="fa fa-subscript"></i> fa fa-subscript</span> ',
        html: '<span><i class="fa fa-subscript"></i> fa fa-subscript</span> ',
        title: 'fa fa-subscript'
      },
      {
        id: 'fa fa-subway',
        text: '<span><i class="fa fa-subway"></i> fa fa-subway</span> ',
        html: '<span><i class="fa fa-subway"></i> fa fa-subway</span> ',
        title: 'fa fa-subway'
      },
      {
        id: 'fa fa-suitcase',
        text: '<span><i class="fa fa-suitcase"></i> fa fa-suitcase</span> ',
        html: '<span><i class="fa fa-suitcase"></i> fa fa-suitcase</span> ',
        title: 'fa fa-suitcase'
      },
      {
        id: 'fa fa-sun-o',
        text: '<span><i class="fa fa-sun-o"></i> fa fa-sun-o</span> ',
        html: '<span><i class="fa fa-sun-o"></i> fa fa-sun-o</span> ',
        title: 'fa fa-sun-o'
      },
      {
        id: 'fa fa-superpowers',
        text: '<span><i class="fa fa-superpowers"></i> fa fa-superpowers</span> ',
        html: '<span><i class="fa fa-superpowers"></i> fa fa-superpowers</span> ',
        title: 'fa fa-superpowers'
      },
      {
        id: 'fa fa-superscript',
        text: '<span><i class="fa fa-superscript"></i> fa fa-superscript</span> ',
        html: '<span><i class="fa fa-superscript"></i> fa fa-superscript</span> ',
        title: 'fa fa-superscript'
      },
      {
        id: 'fa fa-support',
        text: '<span><i class="fa fa-support"></i> fa fa-support</span> ',
        html: '<span><i class="fa fa-support"></i> fa fa-support</span> ',
        title: 'fa fa-support'
      },
      {
        id: 'fa fa-table',
        text: '<span><i class="fa fa-table"></i> fa fa-table</span> ',
        html: '<span><i class="fa fa-table"></i> fa fa-table</span> ',
        title: 'fa fa-table'
      },
      {
        id: 'fa fa-tablet',
        text: '<span><i class="fa fa-tablet"></i> fa fa-tablet</span> ',
        html: '<span><i class="fa fa-tablet"></i> fa fa-tablet</span> ',
        title: 'fa fa-tablet'
      },
      {
        id: 'fa fa-tachometer',
        text: '<span><i class="fa fa-tachometer"></i> fa fa-tachometer</span> ',
        html: '<span><i class="fa fa-tachometer"></i> fa fa-tachometer</span> ',
        title: 'fa fa-tachometer'
      },
      {
        id: 'fa fa-tag',
        text: '<span><i class="fa fa-tag"></i> fa fa-tag</span> ',
        html: '<span><i class="fa fa-tag"></i> fa fa-tag</span> ',
        title: 'fa fa-tag'
      },
      {
        id: 'fa fa-tags',
        text: '<span><i class="fa fa-tags"></i> fa fa-tags</span> ',
        html: '<span><i class="fa fa-tags"></i> fa fa-tags</span> ',
        title: 'fa fa-tags'
      },
      {
        id: 'fa fa-tasks',
        text: '<span><i class="fa fa-tasks"></i> fa fa-tasks</span> ',
        html: '<span><i class="fa fa-tasks"></i> fa fa-tasks</span> ',
        title: 'fa fa-tasks'
      },
      {
        id: 'fa fa-taxi',
        text: '<span><i class="fa fa-taxi"></i> fa fa-taxi</span> ',
        html: '<span><i class="fa fa-taxi"></i> fa fa-taxi</span> ',
        title: 'fa fa-taxi'
      },
      {
        id: 'fa fa-telegram',
        text: '<span><i class="fa fa-telegram"></i> fa fa-telegram</span> ',
        html: '<span><i class="fa fa-telegram"></i> fa fa-telegram</span> ',
        title: 'fa fa-telegram'
      },
      {
        id: 'fa fa-television',
        text: '<span><i class="fa fa-television"></i> fa fa-television</span> ',
        html: '<span><i class="fa fa-television"></i> fa fa-television</span> ',
        title: 'fa fa-television'
      },
      {
        id: 'fa fa-tencent-weibo',
        text: '<span><i class="fa fa-tencent-weibo"></i> fa fa-tencent-weibo</span> ',
        html: '<span><i class="fa fa-tencent-weibo"></i> fa fa-tencent-weibo</span> ',
        title: 'fa fa-tencent-weibo'
      },
      {
        id: 'fa fa-terminal',
        text: '<span><i class="fa fa-terminal"></i> fa fa-terminal</span> ',
        html: '<span><i class="fa fa-terminal"></i> fa fa-terminal</span> ',
        title: 'fa fa-terminal'
      },
      {
        id: 'fa fa-text-height',
        text: '<span><i class="fa fa-text-height"></i> fa fa-text-height</span> ',
        html: '<span><i class="fa fa-text-height"></i> fa fa-text-height</span> ',
        title: 'fa fa-text-height'
      },
      {
        id: 'fa fa-text-width',
        text: '<span><i class="fa fa-text-width"></i> fa fa-text-width</span> ',
        html: '<span><i class="fa fa-text-width"></i> fa fa-text-width</span> ',
        title: 'fa fa-text-width'
      },
      {
        id: 'fa fa-th',
        text: '<span><i class="fa fa-th"></i> fa fa-th</span> ',
        html: '<span><i class="fa fa-th"></i> fa fa-th</span> ',
        title: 'fa fa-th'
      },
      {
        id: 'fa fa-th-large',
        text: '<span><i class="fa fa-th-large"></i> fa fa-th-large</span> ',
        html: '<span><i class="fa fa-th-large"></i> fa fa-th-large</span> ',
        title: 'fa fa-th-large'
      },
      {
        id: 'fa fa-th-list',
        text: '<span><i class="fa fa-th-list"></i> fa fa-th-list</span> ',
        html: '<span><i class="fa fa-th-list"></i> fa fa-th-list</span> ',
        title: 'fa fa-th-list'
      },
      {
        id: 'fa fa-themeisle',
        text: '<span><i class="fa fa-themeisle"></i> fa fa-themeisle</span> ',
        html: '<span><i class="fa fa-themeisle"></i> fa fa-themeisle</span> ',
        title: 'fa fa-themeisle'
      },
      {
        id: 'fa fa-thermometer',
        text: '<span><i class="fa fa-thermometer"></i> fa fa-thermometer</span> ',
        html: '<span><i class="fa fa-thermometer"></i> fa fa-thermometer</span> ',
        title: 'fa fa-thermometer'
      },
      {
        id: 'fa fa-thermometer-0',
        text: '<span><i class="fa fa-thermometer-0"></i> fa fa-thermometer-0</span> ',
        html: '<span><i class="fa fa-thermometer-0"></i> fa fa-thermometer-0</span> ',
        title: 'fa fa-thermometer-0'
      },
      {
        id: 'fa fa-thermometer-1',
        text: '<span><i class="fa fa-thermometer-1"></i> fa fa-thermometer-1</span> ',
        html: '<span><i class="fa fa-thermometer-1"></i> fa fa-thermometer-1</span> ',
        title: 'fa fa-thermometer-1'
      },
      {
        id: 'fa fa-thermometer-2',
        text: '<span><i class="fa fa-thermometer-2"></i> fa fa-thermometer-2</span> ',
        html: '<span><i class="fa fa-thermometer-2"></i> fa fa-thermometer-2</span> ',
        title: 'fa fa-thermometer-2'
      },
      {
        id: 'fa fa-thermometer-3',
        text: '<span><i class="fa fa-thermometer-3"></i> fa fa-thermometer-3</span> ',
        html: '<span><i class="fa fa-thermometer-3"></i> fa fa-thermometer-3</span> ',
        title: 'fa fa-thermometer-3'
      },
      {
        id: 'fa fa-thermometer-4',
        text: '<span><i class="fa fa-thermometer-4"></i> fa fa-thermometer-4</span> ',
        html: '<span><i class="fa fa-thermometer-4"></i> fa fa-thermometer-4</span> ',
        title: 'fa fa-thermometer-4'
      },
      {
        id: 'fa fa-thermometer-empty',
        text: '<span><i class="fa fa-thermometer-empty"></i> fa fa-thermometer-empty</span> ',
        html: '<span><i class="fa fa-thermometer-empty"></i> fa fa-thermometer-empty</span> ',
        title: 'fa fa-thermometer-empty'
      },
      {
        id: 'fa fa-thermometer-full',
        text: '<span><i class="fa fa-thermometer-full"></i> fa fa-thermometer-full</span> ',
        html: '<span><i class="fa fa-thermometer-full"></i> fa fa-thermometer-full</span> ',
        title: 'fa fa-thermometer-full'
      },
      {
        id: 'fa fa-thermometer-half',
        text: '<span><i class="fa fa-thermometer-half"></i> fa fa-thermometer-half</span> ',
        html: '<span><i class="fa fa-thermometer-half"></i> fa fa-thermometer-half</span> ',
        title: 'fa fa-thermometer-half'
      },
      {
        id: 'fa fa-thermometer-quarter',
        text: '<span><i class="fa fa-thermometer-quarter"></i> fa fa-thermometer-quarter</span> ',
        html: '<span><i class="fa fa-thermometer-quarter"></i> fa fa-thermometer-quarter</span> ',
        title: 'fa fa-thermometer-quarter'
      },
      {
        id: 'fa fa-thermometer-three-quarters',
        text: '<span><i class="fa fa-thermometer-three-quarters"></i> fa fa-thermometer-three-quarters</span> ',
        html: '<span><i class="fa fa-thermometer-three-quarters"></i> fa fa-thermometer-three-quarters</span> ',
        title: 'fa fa-thermometer-three-quarters'
      },
      {
        id: 'fa fa-thumb-tack',
        text: '<span><i class="fa fa-thumb-tack"></i> fa fa-thumb-tack</span> ',
        html: '<span><i class="fa fa-thumb-tack"></i> fa fa-thumb-tack</span> ',
        title: 'fa fa-thumb-tack'
      },
      {
        id: 'fa fa-thumbs-down',
        text: '<span><i class="fa fa-thumbs-down"></i> fa fa-thumbs-down</span> ',
        html: '<span><i class="fa fa-thumbs-down"></i> fa fa-thumbs-down</span> ',
        title: 'fa fa-thumbs-down'
      },
      {
        id: 'fa fa-thumbs-o-down',
        text: '<span><i class="fa fa-thumbs-o-down"></i> fa fa-thumbs-o-down</span> ',
        html: '<span><i class="fa fa-thumbs-o-down"></i> fa fa-thumbs-o-down</span> ',
        title: 'fa fa-thumbs-o-down'
      },
      {
        id: 'fa fa-thumbs-o-up',
        text: '<span><i class="fa fa-thumbs-o-up"></i> fa fa-thumbs-o-up</span> ',
        html: '<span><i class="fa fa-thumbs-o-up"></i> fa fa-thumbs-o-up</span> ',
        title: 'fa fa-thumbs-o-up'
      },
      {
        id: 'fa fa-thumbs-up',
        text: '<span><i class="fa fa-thumbs-up"></i> fa fa-thumbs-up</span> ',
        html: '<span><i class="fa fa-thumbs-up"></i> fa fa-thumbs-up</span> ',
        title: 'fa fa-thumbs-up'
      },
      {
        id: 'fa fa-ticket',
        text: '<span><i class="fa fa-ticket"></i> fa fa-ticket</span> ',
        html: '<span><i class="fa fa-ticket"></i> fa fa-ticket</span> ',
        title: 'fa fa-ticket'
      },
      {
        id: 'fa fa-times',
        text: '<span><i class="fa fa-times"></i> fa fa-times</span> ',
        html: '<span><i class="fa fa-times"></i> fa fa-times</span> ',
        title: 'fa fa-times'
      },
      {
        id: 'fa fa-times-circle',
        text: '<span><i class="fa fa-times-circle"></i> fa fa-times-circle</span> ',
        html: '<span><i class="fa fa-times-circle"></i> fa fa-times-circle</span> ',
        title: 'fa fa-times-circle'
      },
      {
        id: 'fa fa-times-circle-o',
        text: '<span><i class="fa fa-times-circle-o"></i> fa fa-times-circle-o</span> ',
        html: '<span><i class="fa fa-times-circle-o"></i> fa fa-times-circle-o</span> ',
        title: 'fa fa-times-circle-o'
      },
      {
        id: 'fa fa-times-rectangle',
        text: '<span><i class="fa fa-times-rectangle"></i> fa fa-times-rectangle</span> ',
        html: '<span><i class="fa fa-times-rectangle"></i> fa fa-times-rectangle</span> ',
        title: 'fa fa-times-rectangle'
      },
      {
        id: 'fa fa-times-rectangle-o',
        text: '<span><i class="fa fa-times-rectangle-o"></i> fa fa-times-rectangle-o</span> ',
        html: '<span><i class="fa fa-times-rectangle-o"></i> fa fa-times-rectangle-o</span> ',
        title: 'fa fa-times-rectangle-o'
      },
      {
        id: 'fa fa-tint',
        text: '<span><i class="fa fa-tint"></i> fa fa-tint</span> ',
        html: '<span><i class="fa fa-tint"></i> fa fa-tint</span> ',
        title: 'fa fa-tint'
      },
      {
        id: 'fa fa-toggle-down',
        text: '<span><i class="fa fa-toggle-down"></i> fa fa-toggle-down</span> ',
        html: '<span><i class="fa fa-toggle-down"></i> fa fa-toggle-down</span> ',
        title: 'fa fa-toggle-down'
      },
      {
        id: 'fa fa-toggle-left',
        text: '<span><i class="fa fa-toggle-left"></i> fa fa-toggle-left</span> ',
        html: '<span><i class="fa fa-toggle-left"></i> fa fa-toggle-left</span> ',
        title: 'fa fa-toggle-left'
      },
      {
        id: 'fa fa-toggle-off',
        text: '<span><i class="fa fa-toggle-off"></i> fa fa-toggle-off</span> ',
        html: '<span><i class="fa fa-toggle-off"></i> fa fa-toggle-off</span> ',
        title: 'fa fa-toggle-off'
      },
      {
        id: 'fa fa-toggle-on',
        text: '<span><i class="fa fa-toggle-on"></i> fa fa-toggle-on</span> ',
        html: '<span><i class="fa fa-toggle-on"></i> fa fa-toggle-on</span> ',
        title: 'fa fa-toggle-on'
      },
      {
        id: 'fa fa-toggle-right',
        text: '<span><i class="fa fa-toggle-right"></i> fa fa-toggle-right</span> ',
        html: '<span><i class="fa fa-toggle-right"></i> fa fa-toggle-right</span> ',
        title: 'fa fa-toggle-right'
      },
      {
        id: 'fa fa-toggle-up',
        text: '<span><i class="fa fa-toggle-up"></i> fa fa-toggle-up</span> ',
        html: '<span><i class="fa fa-toggle-up"></i> fa fa-toggle-up</span> ',
        title: 'fa fa-toggle-up'
      },
      {
        id: 'fa fa-trademark',
        text: '<span><i class="fa fa-trademark"></i> fa fa-trademark</span> ',
        html: '<span><i class="fa fa-trademark"></i> fa fa-trademark</span> ',
        title: 'fa fa-trademark'
      },
      {
        id: 'fa fa-train',
        text: '<span><i class="fa fa-train"></i> fa fa-train</span> ',
        html: '<span><i class="fa fa-train"></i> fa fa-train</span> ',
        title: 'fa fa-train'
      },
      {
        id: 'fa fa-transgender',
        text: '<span><i class="fa fa-transgender"></i> fa fa-transgender</span> ',
        html: '<span><i class="fa fa-transgender"></i> fa fa-transgender</span> ',
        title: 'fa fa-transgender'
      },
      {
        id: 'fa fa-transgender-alt',
        text: '<span><i class="fa fa-transgender-alt"></i> fa fa-transgender-alt</span> ',
        html: '<span><i class="fa fa-transgender-alt"></i> fa fa-transgender-alt</span> ',
        title: 'fa fa-transgender-alt'
      },
      {
        id: 'fa fa-trash',
        text: '<span><i class="fa fa-trash"></i> fa fa-trash</span> ',
        html: '<span><i class="fa fa-trash"></i> fa fa-trash</span> ',
        title: 'fa fa-trash'
      },
      {
        id: 'fa fa-trash-o',
        text: '<span><i class="fa fa-trash-o"></i> fa fa-trash-o</span> ',
        html: '<span><i class="fa fa-trash-o"></i> fa fa-trash-o</span> ',
        title: 'fa fa-trash-o'
      },
      {
        id: 'fa fa-tree',
        text: '<span><i class="fa fa-tree"></i> fa fa-tree</span> ',
        html: '<span><i class="fa fa-tree"></i> fa fa-tree</span> ',
        title: 'fa fa-tree'
      },
      {
        id: 'fa fa-trello',
        text: '<span><i class="fa fa-trello"></i> fa fa-trello</span> ',
        html: '<span><i class="fa fa-trello"></i> fa fa-trello</span> ',
        title: 'fa fa-trello'
      },
      {
        id: 'fa fa-tripadvisor',
        text: '<span><i class="fa fa-tripadvisor"></i> fa fa-tripadvisor</span> ',
        html: '<span><i class="fa fa-tripadvisor"></i> fa fa-tripadvisor</span> ',
        title: 'fa fa-tripadvisor'
      },
      {
        id: 'fa fa-trophy',
        text: '<span><i class="fa fa-trophy"></i> fa fa-trophy</span> ',
        html: '<span><i class="fa fa-trophy"></i> fa fa-trophy</span> ',
        title: 'fa fa-trophy'
      },
      {
        id: 'fa fa-truck',
        text: '<span><i class="fa fa-truck"></i> fa fa-truck</span> ',
        html: '<span><i class="fa fa-truck"></i> fa fa-truck</span> ',
        title: 'fa fa-truck'
      },
      {
        id: 'fa fa-try',
        text: '<span><i class="fa fa-try"></i> fa fa-try</span> ',
        html: '<span><i class="fa fa-try"></i> fa fa-try</span> ',
        title: 'fa fa-try'
      },
      {
        id: 'fa fa-tty',
        text: '<span><i class="fa fa-tty"></i> fa fa-tty</span> ',
        html: '<span><i class="fa fa-tty"></i> fa fa-tty</span> ',
        title: 'fa fa-tty'
      },
      {
        id: 'fa fa-tumblr',
        text: '<span><i class="fa fa-tumblr"></i> fa fa-tumblr</span> ',
        html: '<span><i class="fa fa-tumblr"></i> fa fa-tumblr</span> ',
        title: 'fa fa-tumblr'
      },
      {
        id: 'fa fa-tumblr-square',
        text: '<span><i class="fa fa-tumblr-square"></i> fa fa-tumblr-square</span> ',
        html: '<span><i class="fa fa-tumblr-square"></i> fa fa-tumblr-square</span> ',
        title: 'fa fa-tumblr-square'
      },
      {
        id: 'fa fa-turkish-lira',
        text: '<span><i class="fa fa-turkish-lira"></i> fa fa-turkish-lira</span> ',
        html: '<span><i class="fa fa-turkish-lira"></i> fa fa-turkish-lira</span> ',
        title: 'fa fa-turkish-lira'
      },
      {
        id: 'fa fa-tv',
        text: '<span><i class="fa fa-tv"></i> fa fa-tv</span> ',
        html: '<span><i class="fa fa-tv"></i> fa fa-tv</span> ',
        title: 'fa fa-tv'
      },
      {
        id: 'fa fa-twitch',
        text: '<span><i class="fa fa-twitch"></i> fa fa-twitch</span> ',
        html: '<span><i class="fa fa-twitch"></i> fa fa-twitch</span> ',
        title: 'fa fa-twitch'
      },
      {
        id: 'fa fa-twitter',
        text: '<span><i class="fa fa-twitter"></i> fa fa-twitter</span> ',
        html: '<span><i class="fa fa-twitter"></i> fa fa-twitter</span> ',
        title: 'fa fa-twitter'
      },
      {
        id: 'fa fa-twitter-square',
        text: '<span><i class="fa fa-twitter-square"></i> fa fa-twitter-square</span> ',
        html: '<span><i class="fa fa-twitter-square"></i> fa fa-twitter-square</span> ',
        title: 'fa fa-twitter-square'
      },
      {
        id: 'fa fa-umbrella',
        text: '<span><i class="fa fa-umbrella"></i> fa fa-umbrella</span> ',
        html: '<span><i class="fa fa-umbrella"></i> fa fa-umbrella</span> ',
        title: 'fa fa-umbrella'
      },
      {
        id: 'fa fa-underline',
        text: '<span><i class="fa fa-underline"></i> fa fa-underline</span> ',
        html: '<span><i class="fa fa-underline"></i> fa fa-underline</span> ',
        title: 'fa fa-underline'
      },
      {
        id: 'fa fa-undo',
        text: '<span><i class="fa fa-undo"></i> fa fa-undo</span> ',
        html: '<span><i class="fa fa-undo"></i> fa fa-undo</span> ',
        title: 'fa fa-undo'
      },
      {
        id: 'fa fa-universal-access',
        text: '<span><i class="fa fa-universal-access"></i> fa fa-universal-access</span> ',
        html: '<span><i class="fa fa-universal-access"></i> fa fa-universal-access</span> ',
        title: 'fa fa-universal-access'
      },
      {
        id: 'fa fa-university',
        text: '<span><i class="fa fa-university"></i> fa fa-university</span> ',
        html: '<span><i class="fa fa-university"></i> fa fa-university</span> ',
        title: 'fa fa-university'
      },
      {
        id: 'fa fa-unlink',
        text: '<span><i class="fa fa-unlink"></i> fa fa-unlink</span> ',
        html: '<span><i class="fa fa-unlink"></i> fa fa-unlink</span> ',
        title: 'fa fa-unlink'
      },
      {
        id: 'fa fa-unlock',
        text: '<span><i class="fa fa-unlock"></i> fa fa-unlock</span> ',
        html: '<span><i class="fa fa-unlock"></i> fa fa-unlock</span> ',
        title: 'fa fa-unlock'
      },
      {
        id: 'fa fa-unlock-alt',
        text: '<span><i class="fa fa-unlock-alt"></i> fa fa-unlock-alt</span> ',
        html: '<span><i class="fa fa-unlock-alt"></i> fa fa-unlock-alt</span> ',
        title: 'fa fa-unlock-alt'
      },
      {
        id: 'fa fa-unsorted',
        text: '<span><i class="fa fa-unsorted"></i> fa fa-unsorted</span> ',
        html: '<span><i class="fa fa-unsorted"></i> fa fa-unsorted</span> ',
        title: 'fa fa-unsorted'
      },
      {
        id: 'fa fa-upload',
        text: '<span><i class="fa fa-upload"></i> fa fa-upload</span> ',
        html: '<span><i class="fa fa-upload"></i> fa fa-upload</span> ',
        title: 'fa fa-upload'
      },
      {
        id: 'fa fa-usb',
        text: '<span><i class="fa fa-usb"></i> fa fa-usb</span> ',
        html: '<span><i class="fa fa-usb"></i> fa fa-usb</span> ',
        title: 'fa fa-usb'
      },
      {
        id: 'fa fa-usd',
        text: '<span><i class="fa fa-usd"></i> fa fa-usd</span> ',
        html: '<span><i class="fa fa-usd"></i> fa fa-usd</span> ',
        title: 'fa fa-usd'
      },
      {
        id: 'fa fa-user',
        text: '<span><i class="fa fa-user"></i> fa fa-user</span> ',
        html: '<span><i class="fa fa-user"></i> fa fa-user</span> ',
        title: 'fa fa-user'
      },
      {
        id: 'fa fa-user-circle',
        text: '<span><i class="fa fa-user-circle"></i> fa fa-user-circle</span> ',
        html: '<span><i class="fa fa-user-circle"></i> fa fa-user-circle</span> ',
        title: 'fa fa-user-circle'
      },
      {
        id: 'fa fa-user-circle-o',
        text: '<span><i class="fa fa-user-circle-o"></i> fa fa-user-circle-o</span> ',
        html: '<span><i class="fa fa-user-circle-o"></i> fa fa-user-circle-o</span> ',
        title: 'fa fa-user-circle-o'
      },
      {
        id: 'fa fa-user-md',
        text: '<span><i class="fa fa-user-md"></i> fa fa-user-md</span> ',
        html: '<span><i class="fa fa-user-md"></i> fa fa-user-md</span> ',
        title: 'fa fa-user-md'
      },
      {
        id: 'fa fa-user-o',
        text: '<span><i class="fa fa-user-o"></i> fa fa-user-o</span> ',
        html: '<span><i class="fa fa-user-o"></i> fa fa-user-o</span> ',
        title: 'fa fa-user-o'
      },
      {
        id: 'fa fa-user-plus',
        text: '<span><i class="fa fa-user-plus"></i> fa fa-user-plus</span> ',
        html: '<span><i class="fa fa-user-plus"></i> fa fa-user-plus</span> ',
        title: 'fa fa-user-plus'
      },
      {
        id: 'fa fa-user-secret',
        text: '<span><i class="fa fa-user-secret"></i> fa fa-user-secret</span> ',
        html: '<span><i class="fa fa-user-secret"></i> fa fa-user-secret</span> ',
        title: 'fa fa-user-secret'
      },
      {
        id: 'fa fa-user-times',
        text: '<span><i class="fa fa-user-times"></i> fa fa-user-times</span> ',
        html: '<span><i class="fa fa-user-times"></i> fa fa-user-times</span> ',
        title: 'fa fa-user-times'
      },
      {
        id: 'fa fa-users',
        text: '<span><i class="fa fa-users"></i> fa fa-users</span> ',
        html: '<span><i class="fa fa-users"></i> fa fa-users</span> ',
        title: 'fa fa-users'
      },
      {
        id: 'fa fa-vcard',
        text: '<span><i class="fa fa-vcard"></i> fa fa-vcard</span> ',
        html: '<span><i class="fa fa-vcard"></i> fa fa-vcard</span> ',
        title: 'fa fa-vcard'
      },
      {
        id: 'fa fa-vcard-o',
        text: '<span><i class="fa fa-vcard-o"></i> fa fa-vcard-o</span> ',
        html: '<span><i class="fa fa-vcard-o"></i> fa fa-vcard-o</span> ',
        title: 'fa fa-vcard-o'
      },
      {
        id: 'fa fa-venus',
        text: '<span><i class="fa fa-venus"></i> fa fa-venus</span> ',
        html: '<span><i class="fa fa-venus"></i> fa fa-venus</span> ',
        title: 'fa fa-venus'
      },
      {
        id: 'fa fa-venus-double',
        text: '<span><i class="fa fa-venus-double"></i> fa fa-venus-double</span> ',
        html: '<span><i class="fa fa-venus-double"></i> fa fa-venus-double</span> ',
        title: 'fa fa-venus-double'
      },
      {
        id: 'fa fa-venus-mars',
        text: '<span><i class="fa fa-venus-mars"></i> fa fa-venus-mars</span> ',
        html: '<span><i class="fa fa-venus-mars"></i> fa fa-venus-mars</span> ',
        title: 'fa fa-venus-mars'
      },
      {
        id: 'fa fa-viacoin',
        text: '<span><i class="fa fa-viacoin"></i> fa fa-viacoin</span> ',
        html: '<span><i class="fa fa-viacoin"></i> fa fa-viacoin</span> ',
        title: 'fa fa-viacoin'
      },
      {
        id: 'fa fa-viadeo',
        text: '<span><i class="fa fa-viadeo"></i> fa fa-viadeo</span> ',
        html: '<span><i class="fa fa-viadeo"></i> fa fa-viadeo</span> ',
        title: 'fa fa-viadeo'
      },
      {
        id: 'fa fa-viadeo-square',
        text: '<span><i class="fa fa-viadeo-square"></i> fa fa-viadeo-square</span> ',
        html: '<span><i class="fa fa-viadeo-square"></i> fa fa-viadeo-square</span> ',
        title: 'fa fa-viadeo-square'
      },
      {
        id: 'fa fa-video-camera',
        text: '<span><i class="fa fa-video-camera"></i> fa fa-video-camera</span> ',
        html: '<span><i class="fa fa-video-camera"></i> fa fa-video-camera</span> ',
        title: 'fa fa-video-camera'
      },
      {
        id: 'fa fa-vimeo',
        text: '<span><i class="fa fa-vimeo"></i> fa fa-vimeo</span> ',
        html: '<span><i class="fa fa-vimeo"></i> fa fa-vimeo</span> ',
        title: 'fa fa-vimeo'
      },
      {
        id: 'fa fa-vimeo-square',
        text: '<span><i class="fa fa-vimeo-square"></i> fa fa-vimeo-square</span> ',
        html: '<span><i class="fa fa-vimeo-square"></i> fa fa-vimeo-square</span> ',
        title: 'fa fa-vimeo-square'
      },
      {
        id: 'fa fa-vine',
        text: '<span><i class="fa fa-vine"></i> fa fa-vine</span> ',
        html: '<span><i class="fa fa-vine"></i> fa fa-vine</span> ',
        title: 'fa fa-vine'
      },
      {
        id: 'fa fa-vk',
        text: '<span><i class="fa fa-vk"></i> fa fa-vk</span> ',
        html: '<span><i class="fa fa-vk"></i> fa fa-vk</span> ',
        title: 'fa fa-vk'
      },
      {
        id: 'fa fa-volume-control-phone',
        text: '<span><i class="fa fa-volume-control-phone"></i> fa fa-volume-control-phone</span> ',
        html: '<span><i class="fa fa-volume-control-phone"></i> fa fa-volume-control-phone</span> ',
        title: 'fa fa-volume-control-phone'
      },
      {
        id: 'fa fa-volume-down',
        text: '<span><i class="fa fa-volume-down"></i> fa fa-volume-down</span> ',
        html: '<span><i class="fa fa-volume-down"></i> fa fa-volume-down</span> ',
        title: 'fa fa-volume-down'
      },
      {
        id: 'fa fa-volume-off',
        text: '<span><i class="fa fa-volume-off"></i> fa fa-volume-off</span> ',
        html: '<span><i class="fa fa-volume-off"></i> fa fa-volume-off</span> ',
        title: 'fa fa-volume-off'
      },
      {
        id: 'fa fa-volume-up',
        text: '<span><i class="fa fa-volume-up"></i> fa fa-volume-up</span> ',
        html: '<span><i class="fa fa-volume-up"></i> fa fa-volume-up</span> ',
        title: 'fa fa-volume-up'
      },
      {
        id: 'fa fa-warning',
        text: '<span><i class="fa fa-warning"></i> fa fa-warning</span> ',
        html: '<span><i class="fa fa-warning"></i> fa fa-warning</span> ',
        title: 'fa fa-warning'
      },
      {
        id: 'fa fa-wechat',
        text: '<span><i class="fa fa-wechat"></i> fa fa-wechat</span> ',
        html: '<span><i class="fa fa-wechat"></i> fa fa-wechat</span> ',
        title: 'fa fa-wechat'
      },
      {
        id: 'fa fa-weibo',
        text: '<span><i class="fa fa-weibo"></i> fa fa-weibo</span> ',
        html: '<span><i class="fa fa-weibo"></i> fa fa-weibo</span> ',
        title: 'fa fa-weibo'
      },
      {
        id: 'fa fa-weixin',
        text: '<span><i class="fa fa-weixin"></i> fa fa-weixin</span> ',
        html: '<span><i class="fa fa-weixin"></i> fa fa-weixin</span> ',
        title: 'fa fa-weixin'
      },
      {
        id: 'fa fa-whatsapp',
        text: '<span><i class="fa fa-whatsapp"></i> fa fa-whatsapp</span> ',
        html: '<span><i class="fa fa-whatsapp"></i> fa fa-whatsapp</span> ',
        title: 'fa fa-whatsapp'
      },
      {
        id: 'fa fa-wheelchair',
        text: '<span><i class="fa fa-wheelchair"></i> fa fa-wheelchair</span> ',
        html: '<span><i class="fa fa-wheelchair"></i> fa fa-wheelchair</span> ',
        title: 'fa fa-wheelchair'
      },
      {
        id: 'fa fa-wheelchair-alt',
        text: '<span><i class="fa fa-wheelchair-alt"></i> fa fa-wheelchair-alt</span> ',
        html: '<span><i class="fa fa-wheelchair-alt"></i> fa fa-wheelchair-alt</span> ',
        title: 'fa fa-wheelchair-alt'
      },
      {
        id: 'fa fa-wifi',
        text: '<span><i class="fa fa-wifi"></i> fa fa-wifi</span> ',
        html: '<span><i class="fa fa-wifi"></i> fa fa-wifi</span> ',
        title: 'fa fa-wifi'
      },
      {
        id: 'fa fa-wikipedia-w',
        text: '<span><i class="fa fa-wikipedia-w"></i> fa fa-wikipedia-w</span> ',
        html: '<span><i class="fa fa-wikipedia-w"></i> fa fa-wikipedia-w</span> ',
        title: 'fa fa-wikipedia-w'
      },
      {
        id: 'fa fa-window-close',
        text: '<span><i class="fa fa-window-close"></i> fa fa-window-close</span> ',
        html: '<span><i class="fa fa-window-close"></i> fa fa-window-close</span> ',
        title: 'fa fa-window-close'
      },
      {
        id: 'fa fa-window-close-o',
        text: '<span><i class="fa fa-window-close-o"></i> fa fa-window-close-o</span> ',
        html: '<span><i class="fa fa-window-close-o"></i> fa fa-window-close-o</span> ',
        title: 'fa fa-window-close-o'
      },
      {
        id: 'fa fa-window-maximize',
        text: '<span><i class="fa fa-window-maximize"></i> fa fa-window-maximize</span> ',
        html: '<span><i class="fa fa-window-maximize"></i> fa fa-window-maximize</span> ',
        title: 'fa fa-window-maximize'
      },
      {
        id: 'fa fa-window-minimize',
        text: '<span><i class="fa fa-window-minimize"></i> fa fa-window-minimize</span> ',
        html: '<span><i class="fa fa-window-minimize"></i> fa fa-window-minimize</span> ',
        title: 'fa fa-window-minimize'
      },
      {
        id: 'fa fa-window-restore',
        text: '<span><i class="fa fa-window-restore"></i> fa fa-window-restore</span> ',
        html: '<span><i class="fa fa-window-restore"></i> fa fa-window-restore</span> ',
        title: 'fa fa-window-restore'
      },
      {
        id: 'fa fa-windows',
        text: '<span><i class="fa fa-windows"></i> fa fa-windows</span> ',
        html: '<span><i class="fa fa-windows"></i> fa fa-windows</span> ',
        title: 'fa fa-windows'
      },
      {
        id: 'fa fa-won',
        text: '<span><i class="fa fa-won"></i> fa fa-won</span> ',
        html: '<span><i class="fa fa-won"></i> fa fa-won</span> ',
        title: 'fa fa-won'
      },
      {
        id: 'fa fa-wordpress',
        text: '<span><i class="fa fa-wordpress"></i> fa fa-wordpress</span> ',
        html: '<span><i class="fa fa-wordpress"></i> fa fa-wordpress</span> ',
        title: 'fa fa-wordpress'
      },
      {
        id: 'fa fa-wpbeginner',
        text: '<span><i class="fa fa-wpbeginner"></i> fa fa-wpbeginner</span> ',
        html: '<span><i class="fa fa-wpbeginner"></i> fa fa-wpbeginner</span> ',
        title: 'fa fa-wpbeginner'
      },
      {
        id: 'fa fa-wpexplorer',
        text: '<span><i class="fa fa-wpexplorer"></i> fa fa-wpexplorer</span> ',
        html: '<span><i class="fa fa-wpexplorer"></i> fa fa-wpexplorer</span> ',
        title: 'fa fa-wpexplorer'
      },
      {
        id: 'fa fa-wpforms',
        text: '<span><i class="fa fa-wpforms"></i> fa fa-wpforms</span> ',
        html: '<span><i class="fa fa-wpforms"></i> fa fa-wpforms</span> ',
        title: 'fa fa-wpforms'
      },
      {
        id: 'fa fa-wrench',
        text: '<span><i class="fa fa-wrench"></i> fa fa-wrench</span> ',
        html: '<span><i class="fa fa-wrench"></i> fa fa-wrench</span> ',
        title: 'fa fa-wrench'
      },
      {
        id: 'fa fa-xing',
        text: '<span><i class="fa fa-xing"></i> fa fa-xing</span> ',
        html: '<span><i class="fa fa-xing"></i> fa fa-xing</span> ',
        title: 'fa fa-xing'
      },
      {
        id: 'fa fa-xing-square',
        text: '<span><i class="fa fa-xing-square"></i> fa fa-xing-square</span> ',
        html: '<span><i class="fa fa-xing-square"></i> fa fa-xing-square</span> ',
        title: 'fa fa-xing-square'
      },
      {
        id: 'fa fa-y-combinator',
        text: '<span><i class="fa fa-y-combinator"></i> fa fa-y-combinator</span> ',
        html: '<span><i class="fa fa-y-combinator"></i> fa fa-y-combinator</span> ',
        title: 'fa fa-y-combinator'
      },
      {
        id: 'fa fa-y-combinator-square',
        text: '<span><i class="fa fa-y-combinator-square"></i> fa fa-y-combinator-square</span> ',
        html: '<span><i class="fa fa-y-combinator-square"></i> fa fa-y-combinator-square</span> ',
        title: 'fa fa-y-combinator-square'
      },
      {
        id: 'fa fa-yahoo',
        text: '<span><i class="fa fa-yahoo"></i> fa fa-yahoo</span> ',
        html: '<span><i class="fa fa-yahoo"></i> fa fa-yahoo</span> ',
        title: 'fa fa-yahoo'
      },
      {
        id: 'fa fa-yc',
        text: '<span><i class="fa fa-yc"></i> fa fa-yc</span> ',
        html: '<span><i class="fa fa-yc"></i> fa fa-yc</span> ',
        title: 'fa fa-yc'
      },
      {
        id: 'fa fa-yc-square',
        text: '<span><i class="fa fa-yc-square"></i> fa fa-yc-square</span> ',
        html: '<span><i class="fa fa-yc-square"></i> fa fa-yc-square</span> ',
        title: 'fa fa-yc-square'
      },
      {
        id: 'fa fa-yelp',
        text: '<span><i class="fa fa-yelp"></i> fa fa-yelp</span> ',
        html: '<span><i class="fa fa-yelp"></i> fa fa-yelp</span> ',
        title: 'fa fa-yelp'
      },
      {
        id: 'fa fa-yen',
        text: '<span><i class="fa fa-yen"></i> fa fa-yen</span> ',
        html: '<span><i class="fa fa-yen"></i> fa fa-yen</span> ',
        title: 'fa fa-yen'
      },
      {
        id: 'fa fa-yoast',
        text: '<span><i class="fa fa-yoast"></i> fa fa-yoast</span> ',
        html: '<span><i class="fa fa-yoast"></i> fa fa-yoast</span> ',
        title: 'fa fa-yoast'
      },
      {
        id: 'fa fa-youtube',
        text: '<span><i class="fa fa-youtube"></i> fa fa-youtube</span> ',
        html: '<span><i class="fa fa-youtube"></i> fa fa-youtube</span> ',
        title: 'fa fa-youtube'
      },
      {
        id: 'fa fa-youtube-play',
        text: '<span><i class="fa fa-youtube-play"></i> fa fa-youtube-play</span> ',
        html: '<span><i class="fa fa-youtube-play"></i> fa fa-youtube-play</span> ',
        title: 'fa fa-youtube-play'
      },
      {
        id: 'fa fa-youtube-square',
        text: '<span><i class="fa fa-youtube-square"></i> fa fa-youtube-square</span> ',
        html: '<span><i class="fa fa-youtube-square"></i> fa fa-youtube-square</span> ',
        title: 'fa fa-youtube-square'
      },
    ];

    $(".fontawesome_").select2({
      data: data,
      templateResult: function (d) { return $(d.text); },
      templateSelection: function (d) { return $(d.text); },
      
    })
  });
</script>


{{-- Add this as SCRIPT in "edit.blade.php" --}}
<script type="text/javascript">
  $(document).ready(function(){
    var searchWord = '{{ $singleMenu->icon }}';
    if ($('.fontawesome_ option:contains('+searchWord+')').length) {

      var value_ = $('.fontawesome_ option:contains('+searchWord+')').val();
      $('.fontawesome_ option[value="'+value_+'"]').siblings().removeAttr('selected', '""');
      $('.fontawesome_ option[value="'+value_+'"]').attr('selected', '""');
      $('#select2-fontawesome_-container').html('<span><i class="'+searchWord+'"></i> '+searchWord+'</span>');

    }
  });
</script>