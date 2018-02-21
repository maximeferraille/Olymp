import { Injectable } from '@angular/core';

@Injectable()
export class DateService
{
    constructor(){}

    // tryParseDateFromString(dateStringCandidateValue, format = "ymd") {
    //     if (!dateStringCandidateValue) { return null; }
    //     let mapFormat = format
    //             .split("")
    //             .reduce(function (a, b, i) { a[b] = i; return a;}, {});
    //     const dateStr2Array = dateStringCandidateValue.split(/[ :\-\/]/g);
    //     const datePart = dateStr2Array.slice(0, 3);
    //     let datePartFormatted = [
    //             +datePart[mapFormat.y],
    //             +datePart[mapFormat.m]-1,
    //             +datePart[mapFormat.d] ];
    //     if (dateStr2Array.length > 3) {
    //         dateStr2Array.slice(3).forEach(t => datePartFormatted.push(+t));
    //     }
    //     // test date validity according to given [format]
    //     const dateTrial = new Date(Date.UTC.apply(null, datePartFormatted));
    //     return dateTrial && dateTrial.getFullYear() === datePartFormatted[0] &&
    //             dateTrial.getMonth() === datePartFormatted[1] &&
    //             dateTrial.getDate() === datePartFormatted[2]
    //                 ? dateTrial :
    //                 null;
    // }

    timeRemaining(d) {
        d = (Date.now() - d.getTime()) / 1000;
        var seconds = parseInt(d, 10);

        var days = Math.floor(seconds / (3600*24));
        seconds  -= days*3600*24;
        var hrs   = Math.floor(seconds / 3600);
        seconds  -= hrs*3600;
        var mnts = Math.floor(seconds / 60);
        seconds  -= mnts*60;

        if ( days <= 0 && hrs > 0 ) {
            return(hrs+" Hrs");
        } else if ( hrs <= 0 && mnts > 0 ) {
            return(mnts+" Min");
        } else if ( mnts <= 0 && seconds > 0) {
            return(seconds+" Seconds");
        }

        return(days+" days, "+hrs+" Hrs, "+mnts+" Minutes, "+seconds+" Seconds");
    }

    isDateFutur(d) {
        var now = new Date();
        if (d < now) {
            return false;
        } else {
            return true;
        }
    }
}