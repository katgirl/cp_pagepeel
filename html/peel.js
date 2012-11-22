/**
 * PagePeel
 * Returns a flash object including the given images in the params.
 * based on the peelscript http://www.marcofolio.net/webdesign/create_a_peeling_corner_on_your_website.html
 * 
 * @author              Stefan Schulz-Lauterbach <http://clickpress.de>
 * @author              <http://www.marcofolio.net>
 * @version             1.0.0
 * @license		MIT License  
 * 
 * 2011-01-29
 */


var PagePeel = new Class({
    
    Implements: [Options],
    
    options: {
        jumpTo: '/',
        smallImg: 'small.png',
        bigImg: 'large.png',
        smallPath: '',
        bigPath: '',
        newWindow: false
    },
            
    initialize: function(options){
        this.setOptions(options);
        this.smallParams    =   this.options.smallPath + '?ico=' + this.options.smallImg;
        this.bigParams      =   this.options.bigPath + '?big=' + this.options.bigImg + '&amp;jumpTo=' + this.options.jumpTo + '&amp;newWindow=' + this.options.newWindow;   
        this.buildPeel(this.options);
    },
    
    //later ...
    sizeup987: function(){  return true },
    sizedown987: function(){  return true },
    
    
    buildPeel: function(options){
        body = $(document.body);
        var jcornerBig = new Element('div', {
            'id': 'jcornerBig',
            html: this.flashcodeBig()
        }).inject(body);
        
        var jcornerSmall = new Element('div', {
            'id': 'jcornerSmall',
            html: this.flashcodeSmall()
        }).inject(body);
        
        setTimeout("$('jcornerBig').setStyle('top','-1000px')",1000);
    },

    
    flashcodeBig: function(){
        return '<object type="application/x-shockwave-flash" data="'+ this.bigParams +'" id="jcornerBigObject" width="650" height="650"><param name="allowScriptAccess" value="always"/><param name="movie" value="'+ this.bigParams +'"/><param name="FlashVars" value="'+ this.bigParams +'"/><param name="wmode" value="transparent"/></object>';
    },
    
    flashcodeSmall: function(){
        return '<object type="application/x-shockwave-flash" data="'+ this.smallParams +'" id="jcornerSmallObject" width="100" height="100"><param name="FlashVars" value="?ico='+ this.smallParams +'"/><param name="allowScriptAccess" value="always"/><param name="movie" value="'+ this.smallParams +'"/><param name="wmode" value="transparent" /></object>';
    }
    

});