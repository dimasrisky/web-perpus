import React from "react";
import ReactDOM from "react-dom/client";
import Home from "./views/Home.jsx";
import Login from "./views/Login.jsx";
import Register from "./views/Register.jsx";
import { RouterProvider, createBrowserRouter } from "react-router-dom";
import "./index.css";
import  CreateBuku  from "./views/crud-buku/CreateBuku.jsx";

const router = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "login",
    element: <Login />,
  },
  {
    path: "register",
    element: <Register />,
  },
  {
    path: "buku",
    children : [
      {
        path: 'create',
        element: <CreateBuku />
      }
    ],
  },
]);

ReactDOM.createRoot(document.getElementById("root")).render(
  <RouterProvider router={router} />
);
