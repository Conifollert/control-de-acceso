import axios from 'axios';
import moment from 'moment'

const accesses = {}

accesses.index = async (dni, date) => {
    const newDate = date != ''? moment(date).format('YYYY-MM-DD') : ''
    const url = `http://127.0.0.1:8000/api/accesses?dni=${dni}&date=${newDate}`
    const res = await axios.get(url)
        .then(response => { return response.data })
        .catch(error => { return error })
    return res
}

export default accesses;
