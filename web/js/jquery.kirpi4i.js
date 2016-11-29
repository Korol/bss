/**
 * jQuery Kirpi4i plugin
 * http://css.if.ua/
 *
 * Copyright 2012, Anton Thepkovsky
 * zippovich@gmail.com
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Date: Sat Dec 29 2012
 */
(function($) {
    $.fn.kirpi4i = function(options) {
        var settings = $.extend({
            'averageHeight': 120,
            'margin': 1,
            'maxInRow': 4
        }, options);
        return this.each(function() {
            var iContainer = $(this),
                icImages = iContainer.find('img'),
                icWidth = iContainer.width(),
                dims = new Array(),
                iciCount = icImages.length;
                
            icImages.each(function(i) {
                dims[i] = new Array($(this).width(), $(this).height());
            });
            
            var cnt = 0;
            var rowI = new Array();
            function row() {
                var ah = settings.averageHeight,
                    wcTemp = 0,
                    tCnt = 0;
                for (var i = cnt; i < iciCount; i++) {
                    var b = 1;
                    var wTemp = parseInt(ah * dims[i][0] / dims[i][1]) + settings.margin * 2;
                    if (wcTemp + wTemp < icWidth) {
                        wcTemp += wTemp;
                        cnt++;
                        tCnt++;
                        if (tCnt == settings.maxInRow) {
                            if (i == iciCount - 2) {
                                cnt++;
                                tCnt++;
                            }
                            rowI.push(new Array(tCnt, b));
                            row();
                            return;
                        }
                    }
                    else {
                        if (i == iciCount - 1) {
                            cnt++;
                            tCnt++;
                            b = -1;
                        }
                        rowI.push(new Array(tCnt, b));
                        row();
                        return;
                    }
                    if (i == iciCount - 1) {
                        rowI.push(new Array(tCnt, b));
                    }
                }
            }
            row();
            
            function getW(b, e, n) {
                var h = settings.averageHeight;
                
                function gw(h) {
                    var ww = 0
                    for (var i = b; i < b + e; i++) {
                        ww += parseInt(h * dims[i][0] / dims[i][1]);
                    }
                    if (n > 0) {
                        if (ww < icWidth - e * settings.margin * 2) {
                            h++;
                            return gw(h);
                        }
                        else {
                            h--;
                            return h;
                        }
                    }
                    else {
                        if (ww > icWidth - e * settings.margin * 2) {
                            h--;
                            return gw(h);
                        }
                        else {
                            h--;
                            return h;
                        }
                    }
                }
                h = gw(h);
                
                return h;
            }
            
            cnt = 0;
            var Dim = new Array();
            $.each(rowI, function(index, item) {
                Dim.push(getW(cnt, item[0], item[1]));
                cnt += item[0];
            });
            
            cnt = 0;
            $.each(Dim, function(index, item) {
                for (var i = cnt; i < rowI[index][0] + cnt; i++) {
                    $(icImages[i]).css({
                        'height': Dim[index],
                        'width': parseInt(Dim[index] * dims[i][0] / dims[i][1]),
                        'display': 'block',
                        'float': 'left',
                        'margin': settings.margin
                    });
                }
                cnt += rowI[index][0];
            });
        });
    };
})(jQuery);