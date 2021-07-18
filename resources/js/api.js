// TODO: magari strutturare ad oggetto, pero boh per ora va bene
export const allUsersPath = 'api/search?'; // path per la ricerca di tutti gli utenti
export const sponsoredUsersPath = 'api/sponsored'; // path utenti sponsorizzati
export const categories = `api/categories/index`;

export function promisedUsers(apiPath, ...params) {
    let paramsArray = [...params];
    return axios.get(apiPath + '?' + paramsArray.join('&'));
}

export function parseQueryString(queryString) {
    queryString.replace(/^\?/, '');
    return queryString.split('&');
}
// export f


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