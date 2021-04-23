const formContainer = document.querySelector("form")
const getFormData = () => new FormData( formContainer )

const postImage = async event =>
{
	const data = getFormData()

	const response = await fetch
	(
		"../_php/inserir.php",
		{
			method: "POST",
			body: data
		}
	)
}

formContainer.addEventListener( "submit", event => {

    event.preventDefault()

    postImage()

    formContainer.reset()
} )