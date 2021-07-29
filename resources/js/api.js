// TODO: magari strutturare ad oggetto, pero boh per ora va bene
export const allUsersPath = 'api/search'; // path per la ricerca di tutti gli utenti
export const sponsoredUsersPath = 'api/sponsored'; // path utenti sponsorizzati
export const categories = `api/categories/index`;

export function promisedUsers(apiPath, params="") {
    return axios.get(apiPath + getStringFromObject(params));
}

export function parseQueryString(queryString) {
    const params = queryString.replace(/^\?/, '').split('&');
    const paramsParsed = params.map(param =>  param.split('='));
    return Object.fromEntries(paramsParsed);
}

export function getStringFromObject(obj, get_null=false) {
    let objk = Object.entries(obj);
    if (!get_null) {
        objk = objk.filter(item => item[1]!=='');
    }
    const str = '?' + objk.map(i => i[0] + '=' + i[1]).join('&');
    return str
}
// export function cleanObj(obj) {

// }
// export function getInputValue(input, get_empty=false)
// {

// }


// test stupidi
class ApiPath {
    constructor(path, availableParams) {
        this.path = path;
        this.availableParams = availableParams;
    }
    call(params) {
        if (!this.availableParams.includes(params)) {
            return `parametri non validi: usa ${this.availableParams}`;
        }
        return axios.get(apiPath + '?' + params);
    }
}