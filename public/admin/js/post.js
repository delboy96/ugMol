// const endpoint = '/api/posts?page=2';
//
// document.addEventListener('DOMContentLoaded', async () => {
//   const addButton = document.querySelector("#dodaj");
//   const image = document.querySelector("#img_upload");
//   image.addEventListener('change', previewImage);
//   addButton.addEventListener('click', addPost);
// });
//
//
// function addPost() {
//   console.log(1);
// }
//
//
// function previewImage({target}) {
//   const reader = new FileReader();
//   reader.onload = function () {
//     const dataURL = reader.result;
//     const output = document.getElementById('output');
//     output.src = dataURL;
//   };
//   reader.readAsDataURL(target.files[0]);
// }
//
// /**
//  *
//  * @param {number} currentPage
//  * @param {number} lastPage
//  */
// function makePagination(currentPage, lastPage) {
//   const pagination = document.querySelector(".pagination");
//   let output = ``;
//   // const page = +document.URL.split('?')[1].split('=')[1];
//   // console.log(page);
//   if (lastPage > 1) {
//     for (let i = 1; i <= lastPage; i++) {
//       output += `
//         <li class=" ${currentPage === i ? 'active page-item' : 'page-item'}">
//             <a class="page-link" href="posts?page=${i}">${i}
//          </a>
//         </li>
//       `
//     }
//   }
//
//   pagination.innerHTML = output;
//   // @if ($posts->lastPage() > 1)
//   // @for ($i = 1; $i <= $posts->lastPage(); $i++)
//   // <li class="{{ ($posts->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
//   //     <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
//   //   </li>
//   // @endfor
//   // </ul>
//   // @endif
//   // }
// }
//
// function fillTable({data}) {
//   const table = document.querySelector('tbody');
//   let output = ``;
//
//   for (const post of data) {
//     output += `
//       <tr>
//           <td>${post.title}</td>
//           <td>${post.subtitle}</td>
//           <td>${post.body}</td>
//           <td>${post.citat}</td>
//           <td>${post.datum}</td>
//           <td>${post.img_path}</td>
//           <td class="align-middle">
//                <a data-id="${post.id}" class="edit ">
//              <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
//                </a>
//           </td>
//           <td class="align-middle">
//             <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"
//                  <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i>
//              </a>
//           </td>
//         </tr>`;
//   }
//
//   table.innerHTML = output;
// }
//
//
// // const btn = document.querySelector('#btn');
// // const title = document.querySelector('#title');
// // const time = document.querySelector('#time');
// // const mins = document.querySelector('#mins');
// // const ingridients = document.querySelector('#ingridients');
// // const recipeImage = document.querySelector('#recipeImage');
// // const ingridientsListDiv = document.querySelector('#ingridientsList');
// //
// // let editor;
// // const previewTitle = document.querySelector('#preview-title');
// // let ingridientOutput = '';
// // const errorsList = document.querySelector('#errors');
// // // const previewImage = document.querySelector('#pictureSrc');
// // const previewIngridients = document.querySelector('#preview-ingridients');
// // let array = [];
// //
// // ClassicEditor.create(document.querySelector('#editor'))
// //   .then(newEditor => (editor = newEditor))
// //   .catch(error => console.error(error));
// //
// // const titleChange = e => {
// //   !e.target.value ?
// //     (previewTitle.textContent = 'Title') :
// //     (previewTitle.textContent = e.target.value)
// // };
// //
// // const uploadImage = e => {
// //   if (e.target.files.length) {
// //     const image = e.target.files[0];
// //     const {
// //       size,
// //       type
// //     } = image;
// //     const allowedTypes = ['image/jpg', 'image/png', 'image/jpeg'];
// //     const allowedSize = 2000000; // 2MB
// //     let errors = [];
// //
// //     if (size > allowedSize) {
// //       errors = [...errors, 'Big file not allowed']
// //     }
// //
// //     if (!allowedTypes.includes(type)) {
// //       errors = [...errors, 'Invalid file format,allowed JPG,JPEG,PNG']
// //     }
// //
// //     if (errors.length > 0) {
// //       let output = ``;
// //       errors.forEach(err => (output += ErrorNotification(err)));
// //       errorsList.innerHTML = output
// //     } else {
// //       const formData = new FormData();
// //       formData.append('image', image, 'recipe.png');
// //       // Image upload
// //       upload(formData)
// //     }
// //   } else {
// //     console.log('no img')
// //   }
// // };
// //
// // const preparationTime = e => (mins.textContent = ` ${e.target.value} min`);
// //
// // const ingridientsPart = e => {
// //   if (e.keyCode === 13 && e.target.value) {
// //     array = [...array, e.target.value];
// //
// //     let newArr = array.map(item => Ingridient(item)).join(' ');
// //
// //     ingridientOutput += Ingridient(e.target.value);
// //     previewIngridients.innerHTML += `<span class="badge badge-light mr-3">${e.target.value}</span>`;
// //     ingridientsListDiv.innerHTML = newArr;
// //     e.target.value = ''
// //   }
// // };
// //
// // const addRecipe = () => {
// //   const title = document.querySelector('#title').value;
// //   const editorData = editor.getData();
// //
// //   let errors = [];
// //
// //   if (editorData === '<p>&nbsp;</p>') {
// //     errors = [...errors, 'Description must not be empty']
// //   }
// //
// //   if (!title) {
// //     errors = [...errors, 'Title must not be empty']
// //   }
// //
// //   if (time.value === '0') {
// //     errors = [...errors, 'Preparation time must not be 0']
// //   }
// //
// //   if (!previewImage.value.startsWith('images/')) {
// //     errors = [...errors, 'You must choose picture']
// //   }
// //
// //   if (!array.length) {
// //     errors = [...errors, 'No  ingridients']
// //   }
// //
// //   if (errors.length === 0) {
// //     errorsList.innerHTML = ``;
// //     const userID = document.querySelector('#_userID').value;
// //
// //     let headers = new Headers();
// //
// //     headers.append('Accept', 'application/json');
// //
// //     const formData = new FormData();
// //
// //     formData.append('recipeImage', document.querySelector('#pictureSrc').value);
// //     formData.append('title', title);
// //     formData.append('description', editorData);
// //     formData.append('approximatedTime', time.value);
// //     formData.append('userID', userID);
// //     formData.append('ingridients', array.toString());
// //
// //     const options = {
// //       method: 'POST',
// //       headers: headers,
// //       body: formData
// //     };
// //
// //     let request = new Request(
// //       `api/posts`,
// //       options
// //     );
// //
// //     // ajax
// //
// //     fetch(request)
// //       .then(res => res.json())
// //       .then(data => {
// //         clearInputs(['title', 'time']);
// //         editor.setData('');
// //         time.value = '0';
// //         mins.textContent = '';
// //         notification.className = 'animated fadeIn';
// //         notification.innerHTML = SuccessNotification(data);
// //         ingridientsListDiv.innerHTML = '';
// //         recipeImage.value = '';
// //         previewImage.src = data.image
// //       })
// //       .catch(err => console.log(err))
// //   } else {
// //     let output = ``;
// //     errors.forEach(err => (output += ErrorNotification(err)));
// //     errorsList.innerHTML = output
// //   }
// // };
// //
// // const removeIngridient = e => {
// //   if (e.target.parentElement.className.includes('badge')) {
// //     const span = e.target.parentElement;
// //     let content = span.textContent.split(' ');
// //     const ingridientThis = content[0];
// //
// //     span.remove();
// //     array = array.filter(ingridient => ingridient !== ingridientThis);
// //     let outputPreview = '';
// //     array.forEach(ingridient => outputPreview += `<span class="badge badge-light mr-3">${ingridient}</span>`);
// //     previewIngridients.innerHTML = outputPreview
// //
// //   }
// // };
// //
// // const initApp = () => {
// //   btn.addEventListener('click', addRecipe);
// //   title.addEventListener('input', titleChange);
// //   time.addEventListener('input', preparationTime);
// //   ingridients.addEventListener('keyup', ingridientsPart);
// //   recipeImage.addEventListener('input', uploadImage);
// //   document.addEventListener('click', removeIngridient)
// // };
// //
// // document.addEventListener('DOMContentLoaded', initApp);
