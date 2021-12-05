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

accesses.getAccessByDni = async (dni) => {
    const url = `http://127.0.0.1:8000/api/accesses/client?dni=${dni}`
    const res = await axios.get(url)
        .then(response => { return response.data })
        .catch(error => { return error })
    return res
}

accesses.store = async (payload) => {
    let data = new FormData()
    data.append('dni', payload.dni)
    data.append('name', payload.name)
    data.append('lastname', payload.lastname)
    data.append('date', payload.date)
    data.append('time', payload.time)
    data.append('tower', payload.tower)
    data.append('floor', payload.floor)
    data.append('number_depto', payload.number_depto)

    const url = `http://127.0.0.1:8000/api/accesses`
    const res = await axios.post(url, data)
    return res;
}

export default accesses;
