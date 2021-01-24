import React, {Fragment, useState} from 'react'
import Avatar from 'react-avatar-edit'

const AvatarUpload = ({defaultImage, src, token, route}) => {

    const [preview, setPreview] = useState(defaultImage);
    const [image, setImage] = useState(src);
    const [imageName, setImageName] = useState();

    const onClose = () => {
        setPreview(defaultImage)
    }

    const onCrop = (preview) => {
        if (preview) {
            setPreview(preview)
        }
    }

    const onBeforeFileLoad = (elem) => {
        const file = elem.target.files[0];
        const fileName = file.name;
        setImageName(fileName);
        if(elem.target.files[0].size > 71680){
            // alert("File is too big!");
            // elem.target.value = "";
        }
    }
    console.log(preview)

    return (
        <Fragment>
            <div className="d-sm-flex">
                <div className="mb-4">
                    <div className="mb-3 font-size-nm text-sm-left text-center">
                        Change Image
                    </div>
                    <div style={{width: "200px"}} className="mx-auto">
                        <Avatar
                            width={200}
                            height={200}
                            onCrop={onCrop}
                            onClose={onClose}
                            onBeforeFileLoad={onBeforeFileLoad}
                            src={image}
                        />
                    </div>
                </div>
                <div className="ml-sm-4">
                    <div className="mb-3 font-size-nm text-center">
                        Preview
                    </div>
                    <img src={preview} alt="Preview" width={150} height={150} />
                </div>
            </div>

            <form action={route} method="POST" className="text-left mt-3">
                <input type="hidden" name="_token" value={token} />

                <input type="hidden" name="image" value={preview} />

                <input type="hidden" name="imageName" value={imageName} />

                <button
                    className="btn btn-primary btn-standard font-w600"
                    type="submit"
                    disabled={preview === defaultImage}
                >
                    Update
                </button>
            </form>

        </Fragment>
    )
}

export default AvatarUpload;
