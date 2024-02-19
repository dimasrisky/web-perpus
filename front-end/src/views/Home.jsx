import React, { useEffect } from "react";
import { useState } from "react";

const App = () => {
  const [listBuku, setListBuku] = useState();
  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/buku", {
      method: "GET",
      headers: {
        Accept: "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => setListBuku(data.data));
  }, []);

  console.log(listBuku);
  return (
    <>
      {listBuku?.map((buku, index) => (
        <h1 key={index} className="text-blue-600">{buku.judul}</h1>
      ))}
    </>
  );
};

export default App;
