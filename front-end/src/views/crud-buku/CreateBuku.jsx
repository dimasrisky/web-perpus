import React, {useEffect, useState} from 'react'

const CreateBuku = () => {
    const [listKategori, setListKategori] = useState()
    const [inputKategori, setInputKategori] = useState()
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/kategori", {
            method: "GET",
            headers: {
                "Accept" : "application/json"
            }
        })
        .then(response => response.json())
        .then(data => setListKategori(data.data))
    }, [])

    console.log(inputKategori)

    const storeBuku = () => {

    }
  return (
    <>
        <div className="w-screen h-screen flex justify-center items-center">
            <form>
                <h1>Buat Buku Baru</h1>
                <div className='flex flex-col gap-3'>
                    <label htmlFor="judul">Judul Buku</label>
                    <input type="text" placeholder='masukkan judul buku' />
                </div>
                <div className='flex flex-col gap-3'>
                    <label htmlFor="judul">kategori</label>
                    <select name="kategori" id="kategori" onChange={e => setInputKategori(e.target.value)} value={inputKategori}>
                        {listKategori?.map(kategori => <option className='text-black' value={kategori.id}>{kategori.nama}</option>)}
                    </select>
                </div>
                <div className='flex flex-col gap-3'>
                    <label htmlFor="judul">Pengarang</label>
                    <input type="text" placeholder='masukkan judul buku' />
                </div>
                <div className='flex flex-col gap-3'>
                    <label htmlFor="judul">Pengarang</label>
                    <input type="text" placeholder='masukkan judul buku' />
                </div>
                <button onClick={storeBuku}></button>
            </form>
        </div>
    </>
  )
}


export default CreateBuku