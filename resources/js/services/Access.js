import axios from 'axios';

const accesses = {}

accesses.index = async () => {
    const url = `http://127.0.0.1:8000/api/accesses/`
    const res = await axios.get(url)
        .then(response => { return response.data })
        .catch(error => { return error })
    return res
}

export default accesses;
