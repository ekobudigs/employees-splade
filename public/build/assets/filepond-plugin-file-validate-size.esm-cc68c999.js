/*!
 * FilePondPluginFileValidateSize 2.2.8
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */const z=({addFilter:S,utils:a})=>{const{Type:E,replaceInString:I,toNaturalFileSize:t}=a;return S("ALLOW_HOPPER_ITEM",(e,{query:i})=>{if(!i("GET_ALLOW_FILE_SIZE_VALIDATION"))return!0;const _=i("GET_MAX_FILE_SIZE");if(_!==null&&e.size>_)return!1;const l=i("GET_MIN_FILE_SIZE");return!(l!==null&&e.size<l)}),S("LOAD_FILE",(e,{query:i})=>new Promise((_,l)=>{if(!i("GET_ALLOW_FILE_SIZE_VALIDATION"))return _(e);const T=i("GET_FILE_VALIDATE_SIZE_FILTER");if(T&&!T(e))return _(e);const n=i("GET_MAX_FILE_SIZE");if(n!==null&&e.size>n){l({status:{main:i("GET_LABEL_MAX_FILE_SIZE_EXCEEDED"),sub:I(i("GET_LABEL_MAX_FILE_SIZE"),{filesize:t(n,".",i("GET_FILE_SIZE_BASE"),i("GET_FILE_SIZE_LABELS",i))})}});return}const L=i("GET_MIN_FILE_SIZE");if(L!==null&&e.size<L){l({status:{main:i("GET_LABEL_MIN_FILE_SIZE_EXCEEDED"),sub:I(i("GET_LABEL_MIN_FILE_SIZE"),{filesize:t(L,".",i("GET_FILE_SIZE_BASE"),i("GET_FILE_SIZE_LABELS",i))})}});return}const s=i("GET_MAX_TOTAL_FILE_SIZE");if(s!==null&&i("GET_ACTIVE_ITEMS").reduce((F,o)=>F+o.fileSize,0)>s){l({status:{main:i("GET_LABEL_MAX_TOTAL_FILE_SIZE_EXCEEDED"),sub:I(i("GET_LABEL_MAX_TOTAL_FILE_SIZE"),{filesize:t(s,".",i("GET_FILE_SIZE_BASE"),i("GET_FILE_SIZE_LABELS",i))})}});return}_(e)})),{options:{allowFileSizeValidation:[!0,E.BOOLEAN],maxFileSize:[null,E.INT],minFileSize:[null,E.INT],maxTotalFileSize:[null,E.INT],fileValidateSizeFilter:[null,E.FUNCTION],labelMinFileSizeExceeded:["File is too small",E.STRING],labelMinFileSize:["Minimum file size is {filesize}",E.STRING],labelMaxFileSizeExceeded:["File is too large",E.STRING],labelMaxFileSize:["Maximum file size is {filesize}",E.STRING],labelMaxTotalFileSizeExceeded:["Maximum total size exceeded",E.STRING],labelMaxTotalFileSize:["Maximum total file size is {filesize}",E.STRING]}}},A=typeof window<"u"&&typeof window.document<"u";A&&document.dispatchEvent(new CustomEvent("FilePond:pluginloaded",{detail:z}));export{z as default};
