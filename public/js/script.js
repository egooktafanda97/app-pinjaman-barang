// Function to fetch provinces data
async function getProvinces() {
    const url = $("meta[name='url']").attr("content");
    try {
        const response = await axios.get(`${url}/api/wilayah/provinsi`);
        return response.data;
    } catch (error) {
        console.error("Error fetching provinces:", error);
        return [];
    }
}

// Function to fetch districts based on province ID
async function getDistrictsByProvince(provinceId) {
    const url = $("meta[name='url']").attr("content");
    try {
        const response = await axios.get(
            `${url}/api/wilayah/kabupaten/${provinceId}`
        );
        return response.data;
    } catch (error) {
        console.error("Error fetching districts:", error);
        return [];
    }
}

// Function to fetch subdistricts based on district ID
async function getSubdistrictsByDistrict(districtId) {
    const url = $("meta[name='url']").attr("content");
    try {
        const response = await axios.get(
            `${url}/api/wilayah/kecamatan/${districtId}`
        );
        return response.data;
    } catch (error) {
        console.error("Error fetching subdistricts:", error);
        return [];
    }
}

// find
String.prototype.findById = async function (id) {
    try {
        const response = await axios.get(`${this}/${id}`);
        return response.data;
    } catch (error) {
        console.error("Error fetching data:", error);
        return null;
    }
};
