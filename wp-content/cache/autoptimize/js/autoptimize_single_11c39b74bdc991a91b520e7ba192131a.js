$(document).ready(function(){function addToPlaceholder(toAdd,el){el.html(el.html()+toAdd);return new Promise(resolve=>setTimeout(resolve,200));}
function printPhrase(phrase,el,item,count){el.html('');return new Promise(resolve=>{let letters=phrase.split('');letters.reduce((promise,letter,index)=>promise.then(_=>{if(index===letters.length-1){setTimeout(resolve,4000);$('.typing').remove();if(item===count){setTimeout(run,4000);}}
return addToPlaceholder(letter,el);}),Promise.resolve());});}
function printPhrases(phrases,el){phrases.reduce((promise,phrase,item)=>promise.then(_=>printPhrase(phrase,el,item+1,phrases.length)),Promise.resolve());}
function run(){let phrasesAboutUs=["Nào Cùng Đi","Cẩm nang du lịch","Kinh nghiệm du lịch","Du lịch tự túc tiết kiệm"];printPhrases(phrasesAboutUs,$('.inner-banner h1'));}
run();})